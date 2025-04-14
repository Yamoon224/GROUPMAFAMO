<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderByDesc('id')->get();
        $types = Type::all();
        return view('admin.rooms.index', compact('rooms', 'types'));
    }

    /**
     * Display a listing of the resource.
     */
    public function selectAll()
    {
        $rooms = Room::orderByDesc('id')->get();
        return view('admin.rooms.cards', compact('rooms'));
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
        $rooms = Room::all();
        if(!empty($request->search)) {
            $rooms = Room::where('company', 'LIKE', '%'.$request->search.'%')
                ->orwhere('type', 'LIKE', '%'.strtoupper($request->search).'%')
                ->orwhere('phone', 'LIKE', '%'.$request->search.'%');
        }
        $rooms = $rooms->orderByDesc('id')->get();
        return view('admin.rooms.search', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'price' => 'required', 
            'type_id' => 'required|int', 
            'address' => 'required|string|max:255', 
            'name' => 'required|string|max:155', 
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $data = $request->except(['_token']);
        if ($request->hasFile('front')) {
            $data['front'] = 'storage/'.$request->file('front')->store('rooms', 'public');
        }
        if ($request->hasFile('back')) {
            $data['back'] = 'storage/'.$request->file('back')->store('rooms', 'public');
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
        $types = Type::all();
        return view('admin.rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'price' => 'required', 
            'type_id' => 'required|int', 
            'address' => 'required|string|max:255', 
            'name' => 'required|string|max:155', 
        ]);

        $room = Room::find($id);
        $data = $request->except(['_method', '_token']);
        if ($request->hasFile('front')) {
            $request->validate(['front' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['front'] = "storage/".$request->file('front')->store('rooms', 'public');
            if ($room->front) {
                Storage::disk('public')->delete($room->front);
            }
        }
        if ($request->hasFile('back')) {
            $request->validate(['back' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['back'] = "storage/".$request->file('back')->store('rooms', 'public');
            if ($room->back) {
                Storage::disk('public')->delete($room->back);
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
        Storage::disk('public')->delete($room->front);
        Storage::disk('public')->delete($room->back);
        foreach($room->images as $item) {
            Storage::disk('public')->delete($item->link);
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
