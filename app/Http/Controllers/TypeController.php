<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderByDesc('id')->get();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate(['type' => 'required|string|max:255']);
        
        $data = $request->except(['_token']);
        Type::create($data);
        return redirect()->route('types.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = Type::find($id);
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = Type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate(['type' => 'required|string|max:255']);

        $type = Type::find($id);
        $data = $request->except(['_method', '_token']);
        $type->update($data);

        return redirect()->route('types.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        $type->delete();
        return back()->with(['message'=>'']);
    }
}
