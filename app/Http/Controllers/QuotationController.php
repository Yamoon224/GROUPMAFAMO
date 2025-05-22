<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Partner;
use App\Models\Quotation;
use App\Models\Employee;
use App\Services\Fpdf\App;
use App\Models\Affectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class quotationController extends Controller
{

    public function __construct() 
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        $employees = Employee::all();
        $quotations = Quotation::orderByDesc('id')->get();
        return view('admin.quotations.index', compact('quotations', 'partners', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {           
        $data = $request->except(['_token']);
        $data['quotation']['ref'] = "CC".date('Y').mt_rand(1000, 9999);

        DB::beginTransaction();
            $quotation = Quotation::create($data['quotation']);
            foreach($data['details'] as $detail) {
                $detail['quotation_id'] = $quotation->id;
                Detail::create($detail);
            }

            if (!empty($data['affectations'])) {
                foreach ($data['affectations'] as $affectation) {
                    $affectation['quotation_id'] = $quotation->id;
                    Affectation::create($affectation);
                }
            }
        DB::commit();

        return redirect()->route('quotations.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quotation = Quotation::find($id);
        return view('admin.quotations.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partners = Partner::all();
        $employees = Employee::all();
        $quotation = Quotation::find($id);
                
        return view('admin.quotations.edit', compact('quotation', 'partners', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $quotation = Quotation::find($id);
        $data = $request->except(['_method', '_token']);

        $quotation->details()->delete();
        $quotation->affectations()->delete();

        DB::beginTransaction();
            $quotation->update($data['quotation']);
            foreach($data['details'] as $detail) {
                $detail['quotation_id'] = $quotation->id;
                Detail::create($detail);
            }
            
            if (!empty($data['affectations'])) {
                foreach ($data['affectations'] as $affectation) {
                    $affectation['quotation_id'] = $quotation->id;
                    Affectation::create($affectation);
                }
            }
        DB::commit();

        return redirect()->route('quotations.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quotation = Quotation::find($id);
        DB::beginTransaction();
            $quotation->details->delete();
            $quotation->affectations->delete();
            $quotation->delete();
        DB::commit();
        return back()->with(['message'=>'']);
    }

    public function getQuotationPdf($id)
    {
        $quotation = Quotation::find($id);
        return (new App)->quotationTable($quotation);
    }
}
