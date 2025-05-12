<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketReservation;

class TicketController extends Controller
{
    //
    public function create(Request $request)
    {
        return view('tickets.form', [
            'data' => $request->all() // menampung data dari Travelasing
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        
            'route_id' => 'required',
            'transport_name' => 'required',
            'from' => 'required',
            'to' => 'required',
            'departure' => 'required|date',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1'
        ]);

            $validated['user_id'] = auth()->id();

        // Simpan data ke database dan ambil hasilnya
        $ticketReservation = TicketReservation::create($validated);
        \Log::info('Tiket berhasil disimpan:', $ticketReservation->toArray());

        // Redirect dengan parameter ID
        return redirect()->route('payment.index', ['id' => $ticketReservation->id])
            ->with('success', 'Reservasi berhasil disimpan!');
    }

    public function show($id)
    {
          // Mengambil data tiket dan relasi ke user
        $ticketReservation = TicketReservation::with('user')->findOrFail($id); // eager load user

        // Menampilkan view dengan data ticketReservation
        return view('payment.index', [
            'ticketReservation' => $ticketReservation
        ]);
       
    }
}
