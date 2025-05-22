<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'room_id' => 'required|int', 
            'link' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $data = $request->except(['_token']);
        if ($request->hasFile('link')) {
            $data['link'] = 'storages/'.$request->file('link')->store('photos', 'public');
        }
        Image::create($data);
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
        $request->validate(['room_id' => 'required|int']);

        $image = Image::find($id);
        $data = $request->except(['_method', '_token']);
        if ($request->hasFile('link')) {
            $request->validate(['link' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['link'] = "storages/".$request->file('link')->store('photos', 'public');
            File::delete($image->link);
        }
        $image->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::find($id);
        File::delete($image->link);
        $image->delete();
        return back()->with(['message'=>'']);
    }
}
