<?php

namespace App\Http\Controllers;

use App\Services\Fpdf\App;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::orderByDesc('id')->get();
        return view('admin.equipments', compact('equipments'));
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
            'name' => 'required|string|max:150',
            'price' => 'required',
            'qty' => 'required',
            'unit' => 'required'
        ]);
        
        $data = $request->except(['_token']);
        Equipment::create($data);
        return redirect()->route('equipments.index')->with(['message'=>'']);
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
            'name' => 'required|string|max:150',
            'price' => 'required',
            'qty' => 'required',
            'unit' => 'required'
        ]);

        $equipment = Equipment::find($id);
        $data = $request->except(['_method', '_token']);
        $equipment->update($data);

        return redirect()->route('equipments.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipment = Equipment::find($id);
        $equipment->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getEquipmentsPdf()
    {
        $equipments = Equipment::all();
        return (new App)->equipmentsTable($equipments);
    }
}
