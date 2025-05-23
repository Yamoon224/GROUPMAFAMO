<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderByDesc('id')->get();
        return view('admin.partners', compact('partners'));
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $partners = Partner::orderBy('company')->get();
        if(!empty($request->search)) {
            $partners = Partner::where('company', 'LIKE', '%'.$request->search.'%')
                ->orwhere('type', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('phone', 'LIKE', '%'.$request->search.'%')
                ->orderBy('company')
                ->get();
        }
        return view('components.partners', compact('partners'));
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
            'company' => 'required|string|max:255', // 2MB max
            'phone' => 'required|string|max:20', // 2MB max
            'email' => 'required|string|email|max:255', // 2MB max
            'address' => 'required|string|max:255', // 2MB max
            'owner' => 'required|string|max:255', // 2MB max
        ]);
        
        $data = $request->except(['_token']);
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            ]);
            $data['logo'] = 'storages/'.$request->file('logo')->store('companies', 'public');
        }
        Partner::create($data);
        return redirect()->back();
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
            'company' => 'required|string|max:255', // 2MB max
            'phone' => 'required|string|max:20', // 2MB max
            'email' => 'required|string|email|max:255', // 2MB max
            'address' => 'required|string|max:255', // 2MB max
            'owner' => 'required|string|max:255', // 2MB max
        ]);

        $partner = Partner::find($id);
        $data = $request->except(['_method', '_token']);
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            ]);
            $data['logo'] = 'storages/'.$request->file('logo')->store('companies', 'public');
        }
        $partner->update($data);

        return redirect()->route('partners.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return back()->with(['message'=>'']);
    }

    public function getPartnersPdf()
    {
        $partners = Partner::all();
        return (new App)->partnersTable($partners);
    }
}
