<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Models\Group;
use App\Models\Billing;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\Payment;
use App\Models\Quotation;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() 
    {
        return view('admin.dashboard');
    }

    public function databoard(Request $request) 
    {
        $billings = Billing::with('checkout');
        $employees = Employee::with('checkout');
        $quotations = Quotation::with('partner');
        $payments = Payment::with('employee');

        if (!empty($request->from)) {
            $billings = $billings->whereDate('created_at', '>=', $request->from);
            $employees = $employees->whereDate('created_at', '>=', $request->from);
            $quotations = $quotations->whereDate('created_at', '>=', $request->from);
            $payments = $payments->whereDate('created_at', '>=', $request->from);
        }

        if (!empty($request->to)) {
            $billings = $billings->whereDate('created_at', '<=', $request->to);
            $employees = $employees->whereDate('created_at', '<=', $request->to);
            $quotations = $quotations->whereDate('created_at', '<=', $request->to);
            $payments = $payments->whereDate('created_at', '<=', $request->to);
        }

        $billings = $billings->get();
        $employees = $employees->get();
        $quotations = $quotations->get();
        $payments = $payments->get();

        return view('admin.databoard', compact('employees', 'billings', 'quotations', 'payments'));
    }

    public function booking() 
    {
        return view('booking');
    }

    public function profile() 
    {
        return view('admin.profile');
    }
    
    public function groups() 
    {
        $groups = Group::all();
        return view('admin.groups', compact('groups'));
    }

    public function home() 
    {
        $rooms = Room::where('status', 'LIBRE')->orderByDesc('id')->get()->take(12);

        if(!session()->has('currency')) {
            session()->put('currency', 'GNF');
        }
        
        return view('home', compact('rooms'));
    }

    public function room($id, $name) 
    {
        $room = Room::firstWhere(compact('name', 'id'));
        $rooms = Room::where(['status'=>'LIBRE', 'type_id'=>$room->type_id, 'category'=>$room->category])->orderByDesc('id')->get()->take(4);
        return view('room', compact('rooms', 'room'));
    }

    public function _rooms() 
    {
        $rooms = Room::where('status', 'LIBRE');
        if(request()->category) {
            $rooms = $rooms->where('category', request()->category);
        }
        if(request()->type) {
            $rooms = $rooms->where('type_id', request()->type);
        }
        
        $rooms = $rooms->orderByDesc('id')->paginate(12);
        return view('_rooms', compact('rooms'));
    }
    
    public function rooms() 
    {
        $establishments = Establishment::all();
        $rooms = Room::where('status', 'LIBRE')->orderByDesc('id')->paginate(12);

        if(!session()->has('currency')) {
            session()->put('currency', 'GNF');
        }
        
        return view('rooms', compact('rooms', 'establishments'));
    }

    public function setLocaleSwitch($locale)
    {
        if (auth()->check()) {
            $connected = auth()->user();
            $connected->update(compact('locale'));
        }
        session()->put(compact('locale'));
        app()->setLocale(session('locale'));
        return back()->with(['message'=>'']);
    }

    public function setCurrency($currency)
    {
        session()->put('currency', $currency);
        return back()->with(['message'=>'']);
    }
}
