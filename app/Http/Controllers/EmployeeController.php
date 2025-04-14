<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderByDesc('id')->get();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Display a listing of the resource.
     */
    public function selectAll()
    {
        $employees = Employee::orderByDesc('id')->get();
        return view('admin.employees.cards', compact('employees'));
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $employees = Employee::all();
        if(!empty($request->search)) {
            $employees = Employee::where('name', 'LIKE', '%'.$request->search.'%')
                ->orwhere('position', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('diploma', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('contracttype', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('ref', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('phone', 'LIKE', '%'.$request->search.'%');
        }
        $employees = $employees->orderByDesc('id')->get();
        return view('admin.employees.search', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|string|max:255', // 2MB max
            'phone' => 'required|string|max:20', // 2MB max
            'address' => 'required|string|max:255', // 2MB max
            'position' => 'required|string|max:255', // 2MB max
            'brut' => 'required|string|max:80', // 2MB max
            'gender' => 'required|string|max:10', // 2MB max
            'warrantyperson' => 'required|string|max:150', // 2MB max
            'warrantyphone' => 'required|string|max:150', // 2MB max
        ]);
        
        $data = $request->except(['_token']);
        $data['ref'] = "EP".date('Y').mt_rand(1000, 9999);
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            ]);
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }
        Employee::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'name' => 'required|string|max:255', // 2MB max
            'phone' => 'required|string|max:20', // 2MB max
            'address' => 'required|string|max:255', // 2MB max
            'position' => 'required|string|max:255', // 2MB max
            'brut' => 'required|string|max:80', // 2MB max
            'gender' => 'required|string|max:10', // 2MB max
            'warrantyperson' => 'required|string|max:150', // 2MB max
            'warrantyphone' => 'required|string|max:150', // 2MB max
        ]);

        $employee = Employee::find($id);
        $data = $request->except(['_method', '_token']);
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            ]);
            $data['photo'] = $request->file('photo')->store('employees', 'public');
        }
        $employee->update($data);

        return redirect()->route('employees.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return back()->with(['message'=>'']);
    }

    public function getEmployeesPdf()
    {
        $employees = Employee::all();
        return (new App)->employeesTable($employees);
    }
}
