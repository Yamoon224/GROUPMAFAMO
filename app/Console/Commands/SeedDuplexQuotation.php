<?php

namespace App\Console\Commands;

use App\Models\Detail;
use App\Models\Partner;
use App\Models\Quotation;
use App\Services\Fpdf\App as Pdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedDuplexQuotation extends Command
{
    protected $signature = 'quotation:duplex
                            {--partner= : ID du partenaire existant (défaut : Mme Marthe Fomba, créée si absente)}
                            {--began= : Date de début Y-m-d (défaut : aujourd\'hui)}
                            {--ended= : Date de fin Y-m-d (défaut : +2 mois)}
                            {--output= : Chemin du PDF (défaut : storage/app/public/devis-<ref>.pdf)}
                            {--force : Recrée le devis s\'il existe déjà (même titre et partenaire)}';

    protected $description = 'Crée en base le devis de la rénovation de la maison à Fria et génère le PDF correspondant';

    private const TITLE = 'La rénovation de la maison à Fria';

    /**
     * Main d'oeuvre par phase (relevée sur les feuilles manuscrites, à vérifier).
     * Le champ `workforce` du devis en est la somme.
     */
    private const WORKFORCE = [
        'Fondation'            => 20000000,
        'Élévation'            => 15000000,
        'Élévation 1er étage'  => 15000000,
        'Dalle'                => 12000000,
    ];

    /** [catégorie => [[désignation, unité, quantité, prix unitaire], ...]] */
    private function items(): array
    {
        return [
            // Feuilles 1 et 2
            'Fondation' => [
                ['Terrassement de chantier', 'Ens', 1, 2000000],
                ['Fouilles en puits pour semelles isolées', 'm3', 12, 400000],
                ['Longrine', 'm3', 17, 100000],
                ['Remblais', 'm3', 2, 700000],
                ['Sable', 'm3', 2, 2700000],
                ['Granite', 'm3', 2, 3500000],
                ['Fer 14', '', 100, 130000],
                ['Fer 10', '', 20, 100000],
                ['Fer 6', '', 50, 35000],
                ['Planche', '', 100, 100000],
                ['Brique pleine', '', 1000, 13000],
                ['Ciment', 'Tonne', 10, 1800000],
                ['Brouette', '', 5, 500000],
                ['Pelle', '', 6, 30000],
                ['Pioche', '', 6, 50000],
                ['Gamelle', '', 6, 50000],
                ['Seaux', '', 5, 30000],
                ['Chevrons', '', 20, 30000],
                ['Pointes', 'Carton', 4, 500000],
            ],
            // Feuille 3
            'Élévation' => [
                ['Brique', '', 4000, 5000],
                ['Sable', 'm3', 10, 2700000],
                ['Granite', 'm3', 10, 3500000],
                ['Fer 14', '', 40, 130000],
                ['Fer 6', '', 20, 35000],
                ['Ciment', 'Tonne', 7, 1800000],
                ['Fond 15', '', 30, 50000],
            ],
            // Feuille 5
            'Élévation 1er étage' => [
                ['Brique', '', 4000, 5000],
                ['Sable', 'm3', 1, 2700000],
                ['Granite', 'm3', 1, 3500000],
                ['Ciment', 'Tonne', 7, 1800000],
                ['Fer 14', '', 30, 130000],
                ['Fer 6', '', 20, 35000],
                ['Fond 15', '', 20, 50000],
            ],
            // Feuille 4
            'Dalle' => [
                ['Hourdis', '', 590, 12000],
                ['Sable', 'm3', 2, 2700000],
                ['Granite', 'm3', 2, 3500000],
                ['Ciment', 'Tonne', 15, 1800000],
                ['Pointe', '', 4, 500000],
                ['Planche', '', 250, 100000],
                ['Bois rond', '', 500, 20000],
            ],
            "Main d'œuvre" => [
                ["Main d'œuvre fondation duplex", 'Ens', 1, 15000000],
                ["Main d'œuvre élévation duplex", 'Ens', 1, 18000000],
                ["Main d'œuvre coulage de la dalle", 'Ens', 1, 12000000],
            ],
            'Divers' => [
                ['Divers', 'Ens', 1, 15000000],
            ],
        ];
    }

    public function handle(): int
    {
        $partner = $this->resolvePartner();
        if (!$partner) {
            return self::FAILURE;
        }

        $existing = Quotation::where('title', self::TITLE)->where('partner_id', $partner->id)->first();
        if ($existing && !$this->option('force')) {
            $this->warn("Un devis existe déjà ({$existing->ref}). Relancez avec --force pour le recréer.");
            return self::FAILURE;
        }

        $materials = 0;
        foreach ($this->items() as $rows) {
            foreach ($rows as [, , $qty, $price]) {
                $materials += $qty * $price;
            }
        }
        $workforce = array_sum(self::WORKFORCE);

        $quotation = DB::transaction(function () use ($partner, $existing, $materials, $workforce) {
            if ($existing) {
                $existing->details()->forceDelete();
                $existing->forceDelete();
            }

            $quotation = Quotation::create([
                'ref'         => 'CC' . date('Y') . mt_rand(1000, 9999),
                'title'       => self::TITLE,
                'description' => "Devis établi à Conakry le 23/11/2026",
                'cost'        => $materials + $workforce,
                'workforce'   => $workforce,
                'status'      => 'NON DEBUTE',
                'partner_id'  => $partner->id,
                'began_at'    => $this->option('began') ?: now()->toDateString(),
                'ended_at'    => $this->option('ended') ?: now()->addMonths(2)->toDateString(),
            ]);

            foreach ($this->items() as $category => $rows) {
                foreach ($rows as [$label, $unit, $qty, $price]) {
                    Detail::create([
                        'quotation_id' => $quotation->id,
                        'category'     => $category,
                        'label'        => $label,
                        'unit'         => $unit,
                        'qty'          => $qty,
                        'price'        => $price,
                    ]);
                }
            }

            return $quotation;
        });

        $path = $this->option('output') ?: storage_path("app/public/devis-{$quotation->ref}.pdf");
        @mkdir(dirname($path), 0775, true);

        // Les images du PDF sont référencées relativement à public/
        chdir(public_path());
        (new Pdf)->quotationTable($quotation->fresh(['partner', 'details']), $path);

        $this->info("Devis {$quotation->ref} créé (id {$quotation->id}).");
        $this->line('Matériaux    : ' . number_format($materials, 0, ',', ' ') . ' GNF');
        $this->line('Main d\'oeuvre: ' . number_format($workforce, 0, ',', ' ') . ' GNF');
        $this->line('Total        : ' . number_format($materials + $workforce, 0, ',', ' ') . ' GNF');
        $this->info("PDF : {$path}");

        return self::SUCCESS;
    }

    private function resolvePartner(): ?Partner
    {
        if ($id = $this->option('partner')) {
            $partner = Partner::find($id);
            if (!$partner) {
                $this->error("Partenaire #{$id} introuvable.");
            }
            return $partner;
        }

        // Client du devis (créé s'il n'existe pas déjà, repéré par son téléphone)
        return Partner::firstOrCreate(
            ['phone' => '+224 613 89 09 05'],
            [
                'company' => 'Mme Marthe Fomba',
                'owner'   => 'Mme Marthe Fomba',
                'type'    => 'Particulier',
                'email'   => null,
                'address' => 'Fria, Guinée',
            ]
        );
    }
}
