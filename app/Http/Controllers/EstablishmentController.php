<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $establishments = Establishment::orderByDesc('id')->get();
        return view('admin.establishments', compact('establishments'));
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
        $request->validate(['establishment' => 'required|string|max:255']);
        
        $data = $request->except(['_token']);
        Establishment::create($data);
        return redirect()->route('establishments.index')->with(['message'=>'']);
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
        $request->validate(['establishment' => 'required|string|max:255']);

        $establishment = Establishment::find($id);
        $data = $request->except(['_method', '_token']);
        $establishment->update($data);

        return redirect()->route('establishments.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $establishment = Establishment::find($id);
        $establishment->delete();
        return back()->with(['message'=>'']);
    }
}
