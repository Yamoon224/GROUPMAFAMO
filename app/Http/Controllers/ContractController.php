<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Employee;
use App\Services\Fpdf\App;
use App\Models\Affectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\UpdateContractStatusMiddleware;

class ContractController extends Controller
{

    public function __construct() 
    {
        $this->middleware(UpdateContractStatusMiddleware::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::orderByDesc('id')->get();
        return view('admin.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partners = Partner::all();
        $categories = Category::all();
        $employees = Employee::all();
        return view('admin.contracts.create', compact('partners', 'categories', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {           
        $data = $request->except(['_token']);
        $data['contract']['ref'] = "CC".date('Y').mt_rand(1000, 9999);

        DB::beginTransaction();
            $contract = Contract::create($data['contract']);
            foreach($data['details'] as $detail) {
                $detail['contract_id'] = $contract->id;
                Detail::create($detail);
            }

            foreach ($data['affectations'] as $affectation) {
                $affectation['contract_id'] = $contract->id;
                Affectation::create($affectation);
            }
        DB::commit();

        return redirect()->route('contracts.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contract = Contract::find($id);
        return view('admin.contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partners = Partner::all();
        $employees = Employee::all();
        $categories = Category::all();
        $contract = Contract::find($id);
                
        return view('admin.contracts.edit', compact('contract', 'partners', 'employees', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $contract = Contract::find($id);
        $data = $request->except(['_method', '_token']);

        $contract->details()->delete();
        $contract->affectations()->delete();

        DB::beginTransaction();
            $contract->update($data['contract']);
            foreach($data['details'] as $detail) {
                $detail['contract_id'] = $contract->id;
                Detail::create($detail);
            }
            foreach ($data['affectations'] as $affectation) {
                $affectation['contract_id'] = $contract->id;
                Affectation::create($affectation);
            }
        DB::commit();

        return redirect()->route('contracts.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Contract::find($id);
        DB::beginTransaction();
            $contract->details->delete();
            $contract->affectations->delete();
            $contract->delete();
        DB::commit();
        return back()->with(['message'=>'']);
    }

    public function getContractPdf($id)
    {
        $contract = Contract::find($id);
        return (new App)->contractTable($contract);
    }
}
