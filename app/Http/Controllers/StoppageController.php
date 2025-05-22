<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Stoppage;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class StoppageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoppages = Stoppage::orderByDesc('id')->get();
        $employees = Employee::whereDate('contractend', '>=', date('Y-m-d'))
            ->whereDoesntHave('stoppages', fn ($item) =>$item->where('ended_at', '<', now()))
            ->get();

        return view('admin.stoppages', compact('stoppages', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255', // 2MB max
            'reason' => 'required|string|max:500', // 2MB max
            'employee_id' => 'required|int|max:150', // 2MB max
        ]);
        
        $data = $request->except(['_token']);
        Stoppage::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|string|max:255', // 2MB max
            'reason' => 'required|string|max:500', // 2MB max
            'employee_id' => 'required|int|max:150', // 2MB max
        ]);

        $stoppage = Stoppage::find($id);
        $data = $request->except(['_method', '_token']);
        $stoppage->update($data);

        return redirect()->route('stoppages.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stoppage = Stoppage::find($id);
        $stoppage->delete();
        return back()->with(['message'=>'']);
    }

    public function getStoppagesPdf()
    {
        $stoppages = Stoppage::all();
        return (new App)->stoppagesTable($stoppages);
    }
}
