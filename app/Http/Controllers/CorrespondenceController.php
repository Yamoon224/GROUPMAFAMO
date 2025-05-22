<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use Illuminate\Http\Request;
use App\Services\Fpdf\App;

class correspondenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $correspondences = Correspondence::orderByDesc('id')->get();
        return view('admin.correspondences', compact('correspondences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.correspondences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'correspondent' => 'required|string|max:255',
            'object' => 'required|string|max:255',
            'type' => 'required',
            'message' => 'required'
        ]);
        
        $data = $request->except(['_token']);
        Correspondence::create($data);
        return redirect()->route('correspondences.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $correspondence = Correspondence::find($id);
        // return view('admin.correspondences.show', compact('correspondence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $correspondence = Correspondence::find($id);
        // return view('admin.correspondences.edit', compact('correspondence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'correspondent' => 'required|string|max:255',
            'object' => 'required|string|max:255',
            'type' => 'required',
            'message' => 'required'
        ]);

        $correspondence = Correspondence::find($id);
        $data = $request->except(['_method', '_token']);
        $correspondence->update($data);

        return redirect()->route('correspondences.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $correspondence = Correspondence::find($id);
        $correspondence->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getCorrespondencesPdf()
    {
        $correspondences = Correspondence::all();
        return (new App)->correspondencesTable($correspondences);
    }
}
