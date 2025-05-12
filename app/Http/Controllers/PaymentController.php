<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\TicketReservation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;





class PaymentController extends Controller
{
    //
        public function index($id)
    {
        $ticketReservation = TicketReservation::find($id);

        if (!$ticketReservation) {
        return redirect()->back()->with('error', 'Data reservasi tidak ditemukan.');
    }
        $user = Auth::user(); // user yang sedang login
        $userName = $user ? $user->username : 'Siti Nurhafisoh';

        return view('payment.index', [
            'ticketReservation' => $ticketReservation,
            'userName' => $userName
        ]);
    }

 // Menangani pengiriman form pembayaran
public function store(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'metode_pembayaran' => 'required|string',
        'total' => 'required|numeric',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }

    // Ambil data ticket reservation berdasarkan ID
    $ticketReservation = TicketReservation::find($id);

    // Jika tidak ada data tiket, kembalikan response error
    if (!$ticketReservation) {
        return response()->json([
            'message' => 'Tiket tidak ditemukan.'
        ], 404);
    }

    // Simpan pembayaran
    $payment = new Payment();
    $payment->ticket_reservation_id = $ticketReservation->id;
    $payment->metode_pembayaran = $request->metode_pembayaran;
    $payment->total = $request->total;

    $payment->save();

    // Set flash message untuk menunjukkan notifikasi pembayaran berhasil
    session()->flash('paymentSuccess', 'Pembayaran berhasil diproses! Terima kasih.');

    // Redirect kembali ke halaman pembayaran
    return redirect()->route('payment.index', ['id' => $ticketReservation->id]);
}

}