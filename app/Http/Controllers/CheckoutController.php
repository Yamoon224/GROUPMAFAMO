<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::orderByDesc('id')->get();
        return view('admin.checkouts.index', compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.checkouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate(['name' => 'required|string|max:255']);
        
        $data = $request->except(['_token']);
        Checkout::create($data);
        return redirect()->route('checkouts.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checkout = Checkout::find($id);
        return view('admin.checkouts.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $checkout = Checkout::find($id);
        return view('admin.checkouts.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate(['name' => 'required|string|max:255']);

        $checkout = Checkout::find($id);
        $data = $request->except(['_method', '_token']);
        $checkout->update($data);

        return redirect()->route('checkouts.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checkout = Checkout::find($id);
        $checkout->delete();
        return back()->with(['message'=>'']);
    }
}
