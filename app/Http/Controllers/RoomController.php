<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;
use App\Models\Establishment;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderByDesc('id')->get();
        $establishments = Establishment::all();
        return view('admin.rooms.index', compact('rooms', 'establishments'));
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $rooms = Room::orderBy('name')->get();
        if(!empty($request->search)) {
            $rooms = Room::where('name', 'LIKE', '%'.$request->search.'%')
                ->orwhere('category', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('price', 'LIKE', '%'.$request->search.'%')
                ->orwhere('address', 'LIKE', '%'.$request->search.'%')
                ->orderBy('name')
                ->get();
        }
        return view('components.rooms', compact('rooms'));
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
            'price' => 'required', 
            'establishment_id' => 'required|int', 
            'address' => 'required|string|max:255', 
            'name' => 'required|string|max:155', 
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $data = $request->except(['_token']);
        if ($request->hasFile('front')) {
            $data['front'] = 'storages/'.$request->file('front')->store('rooms', 'public');
        }
        if ($request->hasFile('back')) {
            $data['back'] = 'storages/'.$request->file('back')->store('rooms', 'public');
        }
        Room::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $establishments = Establishment::all();
        return view('admin.rooms.edit', compact('room', 'establishments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'price' => 'required', 
            'establishment_id' => 'required|int', 
            'address' => 'required|string|max:255', 
            'name' => 'required|string|max:155', 
        ]);

        $room = Room::find($id);
        $data = $request->except(['_method', '_token']);
        if ($request->hasFile('front')) {
            $request->validate(['front' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['front'] = "storages/".$request->file('front')->store('rooms', 'public');
            if ($room->front) {
                File::delete($room->front);
            }
        }
        if ($request->hasFile('back')) {
            $request->validate(['back' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['back'] = "storages/".$request->file('back')->store('rooms', 'public');
            if ($room->back) {
                File::delete($room->back);
            }
        }
        $room->update($data);

        return redirect()->route('rooms.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        File::delete($room->front);
        File::delete($room->back);
        foreach($room->images as $item) {
            File::delete($item->link);
            $item->delete();
        }
        $room->delete();
        return back()->with(['message'=>'']);
    }

    public function getroomsPdf()
    {
        $rooms = Room::all();
        return (new App)->roomsTable($rooms);
    }
}
