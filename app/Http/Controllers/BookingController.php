<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings.index', compact('bookings'));
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
        // Réservation ouverte aux visiteurs : aucun compte requis.
        $data = $request->validate([
            'room_id' => 'required|integer|exists:rooms,id',
            'customer' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'identifiant' => 'required|string|max:100',
            'type_identifiant' => 'required|string|max:50',
            'begin_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:begin_date',
        ]);

        $room = Room::findOrFail($data['room_id']);
        abort_if($room->status !== 'LIBRE', 422, "Ce bien n'est plus disponible.");

        // Le montant vient toujours du bien, jamais du navigateur.
        $data['amount'] = $room->price;

        $booking = Booking::create($data);

        // Autorise ce visiteur (et lui seul) à télécharger son reçu.
        session()->put('guest_booking', $booking->id);

        return redirect()->route('rooms.bookings.done')->with([
            'message' => __('locale.booking_message'),
            'booking' => $booking->id,
            'sejour' => $room->category == 'SEJOUR',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Visiteur non connecté : seulement sa propre réservation (évite d'énumérer les reçus).
        if (! auth()->check()) {
            abort_unless((string) session('guest_booking') === (string) $id, 403);
        }
        $booking = Booking::findOrFail($id);
        return (new App)->bookingTable($booking);
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
