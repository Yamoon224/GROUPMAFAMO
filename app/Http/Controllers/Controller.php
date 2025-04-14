<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
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

    public function booking() 
    {
        return view('booking');
    }

    public function welcome() 
    {
        $types = Type::all();
        $rooms = Room::where('status', 'LIBRE')->orderByDesc('id')->paginate(12);

        if(!session()->has('currency')) {
            session()->put('currency', 'GNF');
        }
        
        return view('welcome', compact('rooms', 'types'));
    }

    public function room($id, $name) 
    {
        $room = Room::firstWhere(compact('name', 'id'));
        $rooms = Room::where(['status'=>'LIBRE', 'type_id'=>$room->type_id, 'category'=>$room->category])->orderByDesc('id')->get()->take(4);
        return view('room', compact('rooms', 'room'));
    }

    public function rooms() 
    {
        $rooms = Room::where('status', 'LIBRE');
        if(request()->category) {
            $rooms = $rooms->where('category', request()->category);
        }
        if(request()->type) {
            $rooms = $rooms->where('type_id', request()->type);
        }
        
        $rooms = $rooms->orderByDesc('id')->paginate(12);
        return view('rooms', compact('rooms'));
    }

    public function setLocaleApp($locale)
    {
        if (auth()->check()) {
            $connected = auth()->user();
            $connected->update(compact('locale'));
        }
        app()->setLocale($locale);
        return back()->with(['message'=>'']);
    }

    public function setCurrency($currency)
    {
        session()->put('currency', $currency);
        return back()->with(['message'=>'']);
    }
}
