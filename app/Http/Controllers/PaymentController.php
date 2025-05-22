<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Cashflow;
use App\Models\Checkout;
use App\Models\Employee;
use App\Services\Fpdf\App;
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
        $month = strlen(request()->month) == 1 ? str_pad(request()->month, 2, 0, STR_PAD_LEFT) : request()->month;
        $year = request()->year;
        $checkout = request()->checkout;

        $employees = Employee::whereDate('contractbegin', '<=', date($year.'-'.$month.'-d'))
            ->whereDate('contractend', '>=', date($year.'-'.$month.'-d'))
            ->where('hastopay', true)
            ->where('checkout_id', $checkout)
            ->orderByDesc('id')
            ->get();
        return view('admin.payments.create', compact('employees', 'checkout', 'year', 'month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (!empty($data['payments'])) {
            foreach ($data['payments'] as $key => $value) {
                $payment = Payment::create([
                    'salary' => $data['salaries'][$key],
                    'prime' => $data['primes'][$key],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'employee_id' => $key,
                    'checkout_id' => $data['checkout']
                ]);

                Cashflow::create([
                    'label' => 'SORTIE',
                    'amount' => $data['salaries'][$key] + $data['primes'][$key],
                    'description' => __('locale.payment', ['suffix'=>''])." - ".$payment->employee->name,
                    'checkout_id' => $data['checkout']
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

    public function getPaymentPdf($year, $month, $checkout)
    {
        $employees = Employee::whereDate('contractbegin', '<=', date($year.'-'.$month.'-d'))
            ->whereDate('contractend', '>=', date($year.'-'.$month.'-d'))
            ->where('hastopay', true)
            ->where('checkout_id', $checkout)
            ->orderBy('name')
            ->get();
        $checkout = Checkout::find($checkout);
        return (new App)->salariesTable($employees, compact('year', 'month', 'checkout'));
    }
}
