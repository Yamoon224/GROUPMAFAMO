<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Dotation;
use App\Models\Equipment;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class DotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::whereDate('contractbegin', '<=', date('Y-m-d'))
            ->whereDate('contractend', '>=', date('Y-m-d'))
            ->where('hastopay', true)
            ->orderByDesc('id')
            ->get();
        $equipments = Equipment::all();
        $dotations = Dotation::orderByDesc('id')->get();
        return view('admin.dotations', compact('dotations', 'employees', 'equipments'));
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
            'employee_id' => 'required',
            'equipment_id' => 'required',
            'qty' => 'required'
        ]);
        
        $data = $request->except(['_token']);
        Dotation::create($data);
        return redirect()->route('dotations.index')->with(['message'=>'']);
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
        $employees = Employee::whereDate('contractbegin', '<=', date('Y-m-d'))
            ->whereDate('contractend', '>=', date('Y-m-d'))
            ->where('hastopay', true)
            ->orderByDesc('id')
            ->get();
        $equipments = Equipment::all();
        $dotation = Dotation::find($id);
        return view('admin.dotations.edit', compact('dotation', 'employees', 'equipments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'employee_id' => 'required',
            'equipment_id' => 'required',
            'qty' => 'required'
        ]);

        $dotation = Dotation::find($id);
        $data = $request->except(['_method', '_token']);
        $dotation->update($data);

        return redirect()->route('dotations.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dotation = Dotation::find($id);
        $dotation->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getDotationsPdf()
    {
        $dotations = Dotation::all();
        return (new App)->dotationsTable($dotations);
    }
}
