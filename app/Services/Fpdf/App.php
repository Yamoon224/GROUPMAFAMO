<?php
namespace App\Services\Fpdf;

use Codedge\Fpdf\Fpdf\Fpdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;

class App extends Fpdf
{
    public function getQrCode() 
    {
        $path = public_path('images/qrcode.svg');

        // Générer le QR code au format SVG
        QrCode::margin(2)
            ->backgroundColor(211,211,211, 80)
            ->size(100)
            ->generate(url()->current(), $path);
        // Conversing from svg to png format
    	$png = new Imagick();
        $png->readImageBlob(file_get_contents($path));
        $png->writeImages('qrcode.png', false);
        $png->resizeImage(80, 80, imagick::FILTER_LANCZOS, 1);

        return $png->getImageFilename();
    }

    public function getDirectorSignature($up = 0) 
    {
        $this->setXY($this->GetPageWidth()-55, $this->getY()-$up); 
        $this->setFont('Arial', 'IB', 10);
        $this->cell(40, 6, utf8_decode("Abdoul Hamid BANGOURA"), 0, 1, 'L'); 
        $this->image('images/signatures/gd.png', $this->GetPageWidth()-55, $this->getY(), 30);
        $this->setXY($this->GetPageWidth()-55, $this->getY()+21); 
        $this->cell(40, 6, utf8_decode("Directeur Général"), 0, 1, 'L'); 
    }

    public function getAccountantSignature() 
    {
        $this->setXY(15, $this->getY()+3); 
        $this->setFont('Arial', 'IB', 10);
        $this->cell(40, 6, utf8_decode("Maïmouna CAMARA"), 0, 0, 'L'); 
        $this->image('images/signatures/accountant.png', 18, $this->getY()+5, 25);
        $this->setXY(15, $this->getY()+27); 
        $this->cell(40, 6, utf8_decode("Comptable"), 0, 0, 'L'); 
    }

    public function getPartner($partner) 
    {
        $this->setFont('Arial', 'IB', 10);
        $this->setXY(178, $this->getY()-8);
        $this->cell(42, 6, utf8_decode('PARTENAIRE / CLIENT'), 1, 0, 'L');
        $this->cell(73, 6, utf8_decode($partner->company), 1, 1, 'R');
        $this->setX(178);
        $this->cell(42, 6, utf8_decode("DESCRIPTION"), 1, 0, 'L');
        $this->cell(73, 6, utf8_decode($partner->type), 1, 1, 'R');
        $this->setX(178);
        $this->cell(42, 6, utf8_decode("TELEPHONE"), 1, 0, 'L');
        $this->cell(73, 6, utf8_decode($partner->phone), 1, 1, 'R');
        $this->setX(178);
        $this->cell(42, 6, utf8_decode("EMAIL"), 1, 0, 'L');
        $this->cell(73, 6, utf8_decode($partner->email), 1, 1, 'R');
        $this->ln(2);
    }

    public function header()
    {
        $this->image('images/filigranes/'.($this->GetPageWidth() == 210 ? 'portrait' : 'landscape').'.png', 0, 0, $this->GetPageWidth(), $this->GetPageHeight());

        // Logo
        $this->image('images/logo.png', 4, 0, 20);
        
        $this->setX(4);
        $this->setFont('Arial', 'B', 10);

        $this->setXY(25, 1); 
        $this->cell(40, 6, utf8_decode("GROUP MAFAMO PRESS SARL"), 0, 1, 'L'); 

        $this->setFont('Arial', '', 7);
        $this->setXY(25, $this->getY()-2); 
        $this->cell(40, 5, utf8_decode("N°ENTREPRISE/RCCM/GN.TCC.2024.B.08846"), 0, 1, 'L'); 
        $this->setXY(25, $this->getY()-2); 
        $this->cell(40, 4.5, utf8_decode("NIF573019015"), 0, 1, 'L'); 
        $this->setXY(25, $this->getY()-2); 
        $this->cell(40, 4.5, utf8_decode("Téléphone : +224 610421717 / 625123232"), 0, 1, 'L');
        $this->setXY(25, $this->getY()-2); 
        $this->cell(40, 4.5, utf8_decode("Email : groupmafamopress@gmail.com"), 0, 1, 'L'); 
        
        $this->image($this->getQrCode(), $this->GetPageWidth()-20, 1, 16, 0);
        
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        $this->Ln(7);
        // Décalage à droite
        // $this->SetXY(4, 17);
        // $this->Cell($pageWidth - 8, 0, '', 1);
        // Titre
        // Saut de ligne
        $this->Ln(4);
    }

    // Pied de page
    public function footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        $pageWidth = $this->GetPageWidth();
        $pageHeight = $this->GetPageHeight(); 

        $this->SetFont('Arial', 'I', 6);
        $this->Cell($pageWidth, 3, utf8_decode("GROUP MAFAMO PRESS SARL"), 0, 1, 'C');
        $this->Cell($pageWidth, 3, utf8_decode("SIS A L'AEROPORT INTERNATIONAL D'AHMED SEKOU TOURE"), 0, 1, 'C');
        $this->Cell($pageWidth, 3, utf8_decode("Immeuble TOURE APPARTEMENT 4A-AUTO-ROUTE FIDEL CASTRO"), 0, 1, 'C');
        $this->Cell($pageWidth, 3, utf8_decode("COMMUNE DE MATOTO - BP: 2024 Conakry - Rép de Guinée"), 0, 1, 'C');
        $this->Cell($pageWidth, 3, utf8_decode("Tél: (+224) 610421717 / 625123232 - Site Web: www.gmpsarl.com"), 0, 1, 'C');

        $this->Image('images/flag.png', 4, $pageHeight - 17, 25); 
        $this->Image('images/branding.png', $pageWidth - 25 - 4, $pageHeight - 17, 25);
    }

    // Tableau simple
    public function basicTable($header, $data)
    {
        // En-tête
        foreach($header as $col)
            $this->Cell(40, 7, utf8_decode(strtoupper($col)), 1);
        $this->Ln();

        // Données
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    // Tableau amélioré
    function bill($header, $data, $others = NULL)
    {
        // Column Width
        $width = [32, 18, 8, 18];
        
        // Headers
        for($i = 0; $i < count($header); $i++)
            $this->cell($width[$i], 6, utf8_decode($header[$i]), 'LR', 0, 'C');
        $this->Ln();

        
        $this->setFont('Arial', '', 7);
        // Data
        foreach($data as $key => $row)
        {
            $this->setX(2);
            $this->cell($width[0], 6, utf8_decode($row['product']['name']), '', 0, 'C');
            $this->cell($width[1], 6, utf8_decode(moneyFormat($row['price'])), '', 0, 'C');
            $this->cell($width[2], 6, utf8_decode($row['qty']), '', 0, 'C');
            $this->cell($width[3], 6, utf8_decode(moneyFormat($row['amount'])), '', 0, 'C');
            $this->Ln();
        }
        // Trait de terminaison
        // $this->Cell(array_sum($width), 0, '', 'T');
        $this->Ln(2);
        foreach($others as $key => $item)
        {
            $this->setX(22);
            $this->cell(25, 6, utf8_decode($key), '', 0, 'R');
            $this->cell(31, 6, utf8_decode($item), 'LRTB', 0, 'R');
            $this->Ln();
        }
        $this->setX(22);
    }

    // Tableau amélioré
    function receipt($header, $data, $others = NULL)
    {
        // Column Width
        $width = [32, 18, 8, 18];
        
        // Headers
        for($i = 0; $i < count($header); $i++)
            $this->cell($width[$i], 6, utf8_decode($header[$i]), 'LR', 0, 'C');
        $this->Ln();

        
        $this->setFont('Arial', '', 7);
        // Data
        foreach($data as $key => $row)
        {
            $this->setX(2);
            $this->cell($width[0], 6, utf8_decode($row['product']['name']), '', 0, 'C');
            $this->cell($width[1], 6, utf8_decode(moneyFormat($row['price'])), '', 0, 'C');
            $this->cell($width[2], 6, utf8_decode($row['qty']), '', 0, 'C');
            $this->cell($width[3], 6, utf8_decode(moneyFormat($row['amount'])), '', 0, 'C');
            $this->Ln();
        }
        // Trait de terminaison
        // $this->Cell(array_sum($width), 0, '', 'T');
        $this->Ln(2);
        foreach($others as $item)
        {
            $this->setX(2);
            $this->setFont('Arial', 'B', 7);
            $this->cell(15, 6, utf8_decode($item[0]), '', 0, 'R');

            $this->setFont('Arial', 'I', 7);
            $this->cell(25, 6, utf8_decode($item[1]), !empty($item[1]) ? 'LRTB' : '', 0, 'R');

            $this->setFont('Arial', 'B', 7);
            $this->cell(18, 6, utf8_decode($item[2]), '', 0, 'R');
            
            $this->setFont('Arial', 'I', 7);
            $this->cell(18, 6, utf8_decode($item[3]), 'LRTB', 0, 'R');
            $this->Ln();
        }
        $this->setX(22);
    }

    // Tableau amélioré
    function dailyreport($data)
    {
        foreach($data as $item)
        {
            $this->setX(4);
            $this->setFont('Arial', 'IB', 8);
            $this->cell(30, 6, utf8_decode($item[0]), '', 0, 'L');
            
            $this->setFont('Arial', 'I', 8);
            $this->cell(42, 6, utf8_decode($item[1]), !empty($item[1]) ? 'LRTB' : '', 0, 'R');
            $this->Ln();
        }
        $this->setX(22);
    }

    // Tableau Texté
    function FancyTable($header, $data, $isReceipt, $others = [], $isDiama = false)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->setFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'IB');
        // En-tête
        $w = array(10, 80, 35, 30, 35);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->setFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 8);
        $sum = 0;
        $taxs = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->employee->matricule." - ".(!empty($row->employee->currentAffectation()->location) ? $row->employee->currentAffectation()->location : 'Non défini')), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, moneyformat($row->price), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, moneyformat($row->tva*0.01*$row->price), 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, moneyformat($row->price+$row->tva*0.01*$row->price), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
            $sum += $row->price;
            $taxs += $row->tva*0.01*$row->price;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln();
        $this->SetFont('Arial', 'I', 9);
        $supp = ['TOTAL HT'=>moneyformat($sum), 'TOTAL TVA'=>moneyformat($taxs)];
        $ttc = $sum+$taxs;
        if(!empty($others['discount'])) {
            $ttc -= $others['discount']; 
            $supp['TOTAL REMISE'] = moneyformat($others['discount']);
        }
        if(!empty($others['arrears'])) {
            $ttc += $others['arrears']; 
            $supp['TOTAL ARRIERES'] = moneyformat($others['arrears']);
        }
        $supp['MONTANT TTC'] = moneyformat($ttc);
        
        foreach($supp as $key => $item)
        {
            $this->setX(115);
            $this->Cell(40, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(115);
        $this->Cell(85, 0, '', 'T');
        
        $this->SetFont('Arial', 'I', 8);
        $this->setXY(10, $this->getY()-24);
        $this->Cell(80, 0, 'Conakry le '.date('d/m/Y'), '');
        $this->Image('images/signature.png', 10, $this->getY()+2, 30, 0);
        
        $this->Ln(25);
        $this->SetFont('Arial', 'I', 7.8);
        $txt = "Sauf Erreur ou Omission, le montant de ".($isReceipt == 1 ? 'ce reçu' : 'cette facture')." s'élève à ".$supp['MONTANT TTC']." comme TTC ".(!empty($supp['TOTAL ARRIERES']) ? "avec ".$supp['TOTAL ARRIERES']." comme arriérés sur le total HT " : "") . (!empty($supp['TOTAL REMISE']) ? "et ".$supp['TOTAL REMISE']." comme remise sur le total HT " : ""). "Payable en";
        
        if(strlen($txt) <= 110) 
            $txt .= "par chèque ou virement bancaire à l'ordre de: ";
        if(strlen($txt) <= 147 && strlen($txt) > 110) 
            $txt .= "par chèque,";
        // if(strlen($txt) <= 191 && strlen($txt) > 144){
        //     $txt = str_replace("sur le total HT Payable en liquidité, ", '', $txt);
        // } 
        
        $this->Cell(190, 6, utf8_decode($txt), '', 1, 'L');
        if(strlen($txt) <= 110) 
            $this->setXY(10, $this->getY());
        
        // if(strlen($txt) <= 156 && strlen($txt) > 110 && strlen($txt) != 149) {
        //     $this->setX(10);
        //     $this->Cell(30, 3, utf8_decode("par virement bancaire à l'ordre de: "), '', 0, 'L');
        //     $this->setX(53);
        // }
        // dd( strlen($txt) );
        if(strlen($txt) <= 191 && strlen($txt) > 144){
            $this->setX(10);
            $this->Cell(40, 3, utf8_decode("liquidité, par chèque ou par virement bancaire à l'ordre de: "), '', 0, 'L');
            $this->setX(81);
        } 
        
        $bankname = "JAGUAR SECURITY SERVICES SARL - RIB: ". ($isDiama ? '0010330009-04 - DIAMA BANK' : '004.002.4410425102.05 - BANQUE ISLAMIQUE DE GUINEE (BIG)');
        // if(strlen($txt) <= 191 && strlen($txt) > 144) {
        //     $bankname = str_replace("ISLAMIQUE DE GUINEE (BIG)", '', $bankname);
        // } 
        $this->SetFont('Arial', 'IB', 6.5);
        $this->Cell(80, 3, utf8_decode($bankname), '', 1, 'L');
        // if(strlen($txt) <= 191 && strlen($txt) > 144) {
        //     $this->setX(10);
        //     $this->Cell(40, 5, utf8_decode("ISLAMIQUE DE GUINEE (BIG)"), '', 1, 'L');
        // }
    }

    function salariesTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->setFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.6);
        $this->SetFont('','B');
        // En-tête
        $w = array(10, 75, 35, 35, 35);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->setFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('');
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 9);
        $sum = 0; $tva = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->name), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, utf8_decode($row->ref), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, utf8_decode($row->rib), 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, moneyFormat(($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill; 
            $sum += ($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
            $tva += ($row->salary+$row->prime-$row->acompte-$row->sanction)*($row->cnss+$row->rts)*0.01; 
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 9);
        foreach(array('TOTAL HT'=>moneyFormat($sum+$tva), 'TAXES (CNSS & RTS)'=>moneyFormat($tva), 'MONTANT TTC'=>moneyFormat($sum)) as $key => $item)
        {
            $this->setX(105);
            $this->Cell(50, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(105);
        $this->Cell(95, 0, '', 'T');
        $this->Ln(5);
        $this->setX(160);
        $this->Cell(80, 0, 'Conakry, le '.date('d/m/Y'), '');
        $this->Image('images/signature.png', 70, $this->getY()-30, 30, 0);
        
        $this->setX(30);
        $this->Image('images/cachet.png', 10, $this->getY()-30, 20, 0);
        $this->Image('images/signature_only.png', 35, $this->getY()-15, 50, 0);
        
        $this->setX(100);
        
    }

    function affectationsTable($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->setFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('','IB');
        // En-tête
        $w = array(10, 35, 40, 105);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->setFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('');
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 11);
        $sum = 0; $tva = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->matricule), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, moneyFormat(($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, utf8_decode($row->affectations->first()->customer->name), 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill; 
            $sum += ($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
            $tva += ($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 10);
        foreach(array('TOTAL HT'=>moneyFormat($sum+$tva), 'TAXES (CNSS & RTS)'=>moneyFormat($tva), 'MONTANT TTC'=>moneyFormat($sum)) as $key => $item)
        {
            $this->setX(115);
            $this->Cell(40, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(115);
        $this->Cell(85, 0, '', 'T');
        $this->Ln(5);
        $this->setX(160);
        $this->Cell(80, 0, 'PDG', '');
        $this->Image('images/signature_pdg.png', 140, $this->getY()+3, 70, 0);
    }

    public function employeesTable($employees) 
    {
        $this->addPage('L');
        $this->setTitle('LISTE GENERALE DES EMPLOYES');
        $this->setFont('Arial', 'B', 12);

        $pageWidth = $this->GetPageWidth();  
        $text = utf8_decode("LISTE GENERALE DES EMPLOYES");

        $this->SetX(4); 
        $this->Cell($pageWidth - 8, 10, $text, 1, 1, 'C'); 


        // En-têtes du tableau
        $this->setFont('Arial', 'B', 8);
        $header = array('#', 'Prénom & Nom', 'N° Téléphone', 'Adresse', 'Poste', 'Diplôme', 'Etat Civil', 'Contrat', 'Début', 'Fin', 'Garant', 'N° Garant');
        $w = array(8, 41, 20, 30, 30, 30, 25, 20, 20, 20, 30, 15);

        $this->setX(4);
        // Imprimer les en-têtes
        for ($i = 0; $i < count($header); $i++) {
            $this->cell($w[$i], 8, utf8_decode($header[$i]), 1, 0, 'C');
        }
        $this->ln();

        // Imprimer les données (remplacez par votre logique)
        $this->setFont('Arial', 'I', 7);
        foreach ($employees as $key => $item) {
            $this->setX(4);
            $this->cell($w[0], 6, ++$key, 1, 0, 'C');
            $this->cell($w[1], 6, utf8_decode($item->name), 1, 0, 'C');
            $this->cell($w[2], 6, utf8_decode($item->phone), 1, 0, 'C');
            $this->cell($w[3], 6, utf8_decode($item->address), 1, 0, 'C');
            $this->cell($w[4], 6, utf8_decode($item->position), 1, 0, 'C');
            $this->cell($w[5], 6, utf8_decode($item->diploma), 1, 0, 'C');
            $this->cell($w[6], 6, utf8_decode($item->family), 1, 0, 'C');
            $this->cell($w[7], 6, utf8_decode($item->contracttype), 1, 0, 'C');
            $this->cell($w[8], 6, utf8_decode(date('d/m/Y', strtotime($item->contractbegin))), 1, 0, 'C');
            $this->cell($w[9], 6, utf8_decode(date('d/m/Y', strtotime($item->contractend))), 1, 0, 'C');
            $this->cell($w[10], 6, utf8_decode($item->warrantyperson), 1, 0, 'C');
            $this->cell($w[11], 6, utf8_decode($item->warrantyphone), 1, 0, 'C');
            $this->ln();
        }

        $this->ln(2);
        $this->getDirectorSignature();
        $this->output();
        exit;
    }

    public function partnersTable($partners) 
    {
        $this->addPage();
        $this->setTitle('LISTE GENERALE DES PARTENAIRES');
        $this->setFont('Arial', 'B', 12);

        $pageWidth = $this->GetPageWidth();  
        $text = utf8_decode("LISTE GENERALE DES PARTENAIRES");

        $this->SetX(4); 
        $this->Cell($pageWidth - 8, 10, $text, 1, 1, 'C'); 


        // En-têtes du tableau
        $this->setFont('Arial', 'B', 8);
        $header = array('#', 'Type', 'Compagnie / Entreprise', 'N° Téléphone', 'Email', 'Adresse', 'Responsable');
        $w = array(8, 20, 60, 20, 34, 30, 30);

        $this->setX(4);
        // Imprimer les en-têtes
        for ($i = 0; $i < count($header); $i++) {
            $this->cell($w[$i], 8, utf8_decode($header[$i]), 1, 0, 'C');
        }
        $this->ln();

        // Imprimer les données (remplacez par votre logique)
        $this->setFont('Arial', 'I', 7);
        foreach ($partners as $key => $item) {
            $this->setX(4);
            $this->cell($w[0], 6, ++$key, 1, 0, 'C');
            $this->cell($w[1], 6, utf8_decode($item->type), 1, 0, 'C');
            $this->cell($w[2], 6, utf8_decode($item->company), 1, 0, 'C');
            $this->cell($w[3], 6, utf8_decode($item->phone), 1, 0, 'C');
            $this->cell($w[4], 6, utf8_decode($item->email), 1, 0, 'C');
            $this->cell($w[5], 6, utf8_decode($item->address), 1, 0, 'C');
            $this->cell($w[6], 6, utf8_decode($item->owner), 1, 0, 'C');
            $this->ln();
        }

        $this->output();
        exit;
    }

    public function contractTable($contract) 
    {
        $this->addPage('L');
        $this->setTitle('CONTRACT #'.$contract->ref);

        $this->setFillColor(253, 104, 4);
        $this->getPartner($contract->partner);
        $this->setFont('Arial', 'B', 12);
        $this->setX(4); 
        $this->cell($this->GetPageWidth() - 8, 10,  utf8_decode($contract->title), 1, 1, 'C', true); 


        // En-têtes du tableau
        $this->setFont('Arial', 'IB', 10);
        $this->setFillColor(10, 114, 177);
        $header = array('#', 'Désignation', 'Unité', 'Quantité', 'Prix Unitaire', 'Montant');
        $w = array(8, 146, 20, 30, 40, 45);

        $this->setX(4);
        // Imprimer les en-têtes
        for ($i = 0; $i < count($header); $i++) {
            $this->cell($w[$i], 8, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->ln();

        // Imprimer les données (remplacez par votre logique)
        // dd($contract->details->groupBy('category'));
        $iteration = 0;
        $total = 0;
        foreach ($contract->details->groupBy('category') as $category => $details) {
            $this->setX(4);
            $this->setFont('Arial', 'IB', 10);
            $this->cell(8, 6, toroman(++$iteration), 1, 0, 'C');
            $this->cell(236, 6, utf8_decode(strtoupper($category)), 1, 0, 'C');
            $this->cell(45, 6, '', 1, 1, 'C');
            $sub = 0;
            foreach($details as $key => $item) {
                $this->setX(4);
                $this->setFont('Arial', 'I', 8);
                $this->cell($w[0], 6, ++$key, 1, 0, 'C');
                $this->cell($w[1], 6, utf8_decode($item->label), 1, 0, 'L');
                $this->cell($w[2], 6, utf8_decode($item->unit), 1, 0, 'C');
                $this->cell($w[3], 6, utf8_decode($item->qty), 1, 0, 'C');
                $this->cell($w[4], 6, utf8_decode(moneyformat($item->price)), 1, 0, 'C');
                $this->cell($w[5], 6, utf8_decode(moneyformat($item->price*$item->qty)), 1, 0, 'R');
                $this->ln();
                $sub += $item->price*$item->qty;
            }
            $total += $sub;
            $this->setX(4);
            $this->setFont('Arial', 'IB', 10);
            $this->setFillColor(211, 211, 211);

            $this->cell(8, 6, '', 1, 0, 'C', true);
            $this->cell(236, 6, utf8_decode(toroman($iteration).'. MONTANT TOTAL '.strtoupper($category)), 1, 0, 'C', true);
            $this->cell(45, 6, utf8_decode(moneyformat($sub)), 1, 1, 'R', true);
        }

        $this->setFillColor(10, 114, 177);
        $this->setXY(178, $this->getY()+1);
        $this->setFont('Arial', 'IB', 10);
        $this->cell(70, 6, utf8_decode('TOTAL MONTANTS'), 1, 0, 'L', true);
        $this->cell(45, 6, utf8_decode(moneyformat($total)), 1, 1, 'R', true);
        $this->setX(178);
        $this->cell(70, 6, utf8_decode("MAIN D'OEUVRE"), 1, 0, 'L', true);
        $this->cell(45, 6, utf8_decode(moneyformat($contract->workforce)), 1, 1, 'R', true);
        $this->setX(178);
        $this->cell(70, 6, utf8_decode("TOTAL HT"), 1, 0, 'L', true);
        $this->cell(45, 6, utf8_decode(moneyformat($contract->workforce+$total)), 1, 1, 'R', true);
        $this->setX(178);
        $this->cell(70, 6, utf8_decode("TOTAL TVA"), 1, 0, 'L', true);
        $this->cell(45, 6, utf8_decode(moneyformat(0)), 1, 1, 'R', true);
        $this->setX(178);
        $this->cell(70, 6, utf8_decode("TOTAL TTC"), 1, 0, 'L', true);
        $this->cell(45, 6, utf8_decode(moneyformat($contract->workforce+$total)), 1, 1, 'R', true);

        $this->setX(4, $this->getY()+1);
        $this->setFont('Arial', 'IB', 10);
        $this->setFillColor(253, 104, 4);
        $this->multicell($this->GetPageWidth() - 8, 5, utf8_decode("Ce présent dévis s'élève à la somme de ".numtoletters($contract->workforce+$total)." Francs Guinéens (".moneyformat($contract->workforce+$total).") payable par espèces, par chèque ou par virement bancaire au compte GROUP MAFAMO PRESS SARL N°0014160008 / DIAMA BANK S.A"), 1, 'C', true);

        $this->ln(2);
        $this->getAccountantSignature();
        $this->getDirectorSignature(27);
        $this->output();
        exit;
    }
}