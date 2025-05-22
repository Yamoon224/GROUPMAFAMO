<?php

namespace App\Http\Controllers;

use App\Services\Fpdf\App;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderByDesc('id')->get();
        return view('admin.appointments', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'visitor' => 'required|string|max:255',
            'phone' => 'required|string|max:40',
            'visitor' => 'required|string|max:255',
            'began_at' => 'required',
            'ended_at' => 'required',
            'expected_at' => 'required|date',
        ]);
        
        $data = $request->except(['_token']);
        Appointment::create($data);
        return redirect()->route('appointments.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $appointment = Appointment::find($id);
        // return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $appointment = Appointment::find($id);
        // return view('admin.appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'visitor' => 'required|string|max:255',
            'phone' => 'required|string|max:40',
            'visitor' => 'required|string|max:255',
            'began_at' => 'required',
            'ended_at' => 'required',
            'expected_at' => 'required|date',
        ]);

        $appointment = Appointment::find($id);
        $data = $request->except(['_method', '_token']);
        $appointment->update($data);

        return redirect()->route('appointments.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getAppointmentsPdf()
    {
        $appointments = Appointment::all();
        return (new App)->appointmentsTable($appointments);
    }
}
