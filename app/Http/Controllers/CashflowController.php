<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashflows = Cashflow::orderByDesc('id')->get();
        return view('admin.cashflows', compact('cashflows'));
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
            'label' => 'required|string|max:150',
            'amount' => 'required',
            'checkout_id' => 'required',
        ]);

        $cashflow = Cashflow::find($id);
        $data = $request->except(['_method', '_token']);
        $cashflow->update($data);

        return redirect()->route('cashflows.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cashflow = Cashflow::find($id);
        $cashflow->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getCashflowsPdf()
    {
        $cashflows = Cashflow::all();
        return (new App)->cashflowsTable($cashflows);
    }
}
