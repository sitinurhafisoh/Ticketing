<!-- resources/views/ticketing/form.blade.php -->
@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Form Ticketing</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="route_id" value="{{ $data['route_id'] }}">
        <div class="mb-3">
            <label>Transportasi</label>
            <input type="text" name="transport_name" class="form-control" value="{{ $data['transport'] ?? '' }}" readonly>
        </div>
        <div class="mb-3">
            <label>Dari</label>
            <input type="text" name="from" class="form-control" value="{{ $data['from'] }}" readonly>
        </div>
        <div class="mb-3">
            <label>Ke</label>
            <input type="text" name="to" class="form-control" value="{{ $data['to'] }}" readonly>
        </div>
        <div class="mb-3">
            <label>Waktu Keberangkatan</label>
            <input type="datetime-local" name="departure" class="form-control" value="{{ $data['departure'] }}">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="price" class="form-control" value="{{ $data['price'] }}" readonly>
        </div>
        <div class="mb-3">
            <label>Jumlah Tiket</label>
            <input type="number" name="quantity" class="form-control" value="1" min="1">
        </div>
        <button type="submit" class="btn btn-success">Simpan Tiket</button>
    </form>
</div>
@endsection

