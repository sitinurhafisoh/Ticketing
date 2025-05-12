<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TicketReservation;


class TicketController extends Controller
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
        
            {
                $reservation = TicketReservation::create($request->all());
                return response()->json(['success' => true, 'data' => $reservation]);
            }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    $ticketReservation = TicketReservation::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $ticketReservation
        ]);
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
