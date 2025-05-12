@extends('layouts.app')

@section('content')
<h4>Ticket Details</h4>
<ul class="list-group">
    <li class="list-group-item">Flight Code: <strong>{{ $ticket->flight_code }}</strong></li>
    <li class="list-group-item">Passenger Name: {{ $ticket->passenger_name }}</li>
    <li class="list-group-item">Email: {{ $ticket->email }}</li>
    <li class="list-group-item">Status: 
        <span class="badge bg-{{ $ticket->status == 'PAID' ? 'success' : 'warning' }}">
            {{ $ticket->status }}
        </span>
    </li>
</ul>

@if ($ticket->status == 'UNPAID')
    <form method="POST" action="{{ route('payments.store') }}" class="mt-4">
        @csrf
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        <div class="mb-3">
            <label for="amount" class="form-label">Payment Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" required>
        </div>
        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>
@endif
@endsection
