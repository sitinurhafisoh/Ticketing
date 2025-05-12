@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Pembayaran</h2>
    <p>Selamat datang, {{ $userName }}!</p>

  
  <!-- Menampilkan informasi tiket -->
  <div class="bg-gray-50 p-6 rounded-xl shadow-md mb-6">
    <div class="mb-4">
      <strong class="text-gray-700">Rute:</strong> {{ $ticketReservation->from }} - {{ $ticketReservation->to }}
    </div>
    <div class="mb-4">
      <strong class="text-gray-700">Nama Transportasi:</strong> {{ $ticketReservation->transport_name }}
    </div>
    <div class="mb-4">
      <strong class="text-gray-700">Harga:</strong> Rp {{ number_format($ticketReservation->price, 0, ',', '.') }}
    </div>
    <div class="mb-4">
      <strong class="text-gray-700">Jumlah:</strong> {{ $ticketReservation->quantity }}
    </div>
  </div>

  <!-- Form Pembayaran -->
  <form action="{{ route('payment.store', ['id' => $ticketReservation->id]) }}" method="POST">
    @csrf
    <label class="block text-lg font-medium text-gray-700 mb-2">Metode Pembayaran (Rp)</label>
    <div class="select-wrapper">
    <select id="metode_pembayaran" name="metode_pembayaran" class="w-full" required>
        <option value="transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet</option>
        <option value="credit_card">Kartu Kredit</option>
    </select>
    </div>
    <div class="mb-6">
      <label class="block text-lg font-medium text-gray-700 mb-2">Total Pembayaran (Rp)</label>
      <div class="bg-gray-100 p-3 rounded-lg text-gray-700">
        Rp {{ number_format($ticketReservation->price * $ticketReservation->quantity, 0, ',', '.') }}
      </div>
      <input type="hidden" name="total" value="{{ $ticketReservation->price * $ticketReservation->quantity }}">
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-center">
      <button type="submit" class="btn btn-success">Bayar Sekarang</button>
    </div>
  </form>

  <!-- Menampilkan Notifikasi Pembayaran Berhasil -->
  @if(session('paymentSuccess'))
    <div class="mt-6 bg-green-500 text-white p-4 rounded-lg shadow-md text-center">
      {{ session('paymentSuccess') }}
    </div>
  @endif
</div>

<!-- Tambahkan style ini untuk mempercantik dropdown -->
<style>
  select {
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 20 20' fill='gray' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.1 1.02l-4.25 4.5a.75.75 0 01-1.1 0L5.23 8.27a.75.75 0 01.02-1.06z' clip-rule='evenodd'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1rem;
    padding-right: 2.5rem;
  }
</style>
@endsection

