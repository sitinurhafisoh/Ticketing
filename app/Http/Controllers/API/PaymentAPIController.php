<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    // Simpan data dan ambil instance-nya
    $ticketReservation = TicketReservation::create($validated);

    // Redirect ke halaman pembayaran dengan ID
    return redirect()->route('payment.index', ['id' => $ticketReservation->id])
                     ->with('success', 'Reservasi berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
