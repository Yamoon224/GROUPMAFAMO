<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Employee;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkouts = Checkout::all();
        $employees = Employee::whereDate('contractbegin', '<=', date('Y-m-d'))
            ->whereDate('contractend', '>=', date('Y-m-d'))
            ->where('hastopay', true)
            ->orderByDesc('id')
            ->get();
        return view('admin.payments.index', compact('employees', 'checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $checkouts = Checkout::all();
        $employees = Employee::whereDate('contractbegin', '<=', date('Y-m-d'))
            ->whereDate('contractend', '>=', date('Y-m-d'))
            ->where('hastopay', true)
            ->orderByDesc('id')
            ->get();
        $month = request()->month;
        $year = request()->year;

        return view('admin.payments.create', compact('employees', 'checkouts', 'year', 'month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (!empty($data['payments'])) {
            foreach ($data['payments'] as $key => $value) {
                Payment::create([
                    'salary' => $data['salaries'][$key],
                    'prime' => $data['primes'][$key],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'employee_id' => $key,
                    'checkout_id' => $data['checkouts'][$key]
                ]);
            }
        }       

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
