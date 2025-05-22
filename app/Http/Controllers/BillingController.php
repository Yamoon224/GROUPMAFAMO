<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Cashflow;
use App\Models\Checkout;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::all();
        $quotations = Quotation::all();
        $billings = Billing::orderByDesc('id')->get();
        return view('admin.billings', compact('billings', 'quotations', 'checkouts'));
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
        $request->validate([
            'amount' => 'required',
            'remain' => 'required',
            'quotation_id' => 'required|int',
            'checkout_id' => 'required|int',
        ]);
        
        $data = $request->except(['_token']);
        DB::beginTransaction();
            Billing::create($data);
            Cashflow::create([
                'label' => 'SORTIE',
                'amount' => $data['amount'],
                'description' => __('locale.billing', ['suffix'=>''])." - ".$data['observations'],
                'checkout_id' => $data['checkout_id']
            ]);
        DB::commit();
        return redirect()->route('billings.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'amount' => 'required',
            'remain' => 'required',
            'quotation_id' => 'required|int',
        ]);

        $category = Billing::find($id);
        $data = $request->except(['_method', '_token']);
        $category->update($data);

        return redirect()->route('billings.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Billing::find($id);
        $category->delete();
        return back()->with(['message'=>'']);
    }
}
