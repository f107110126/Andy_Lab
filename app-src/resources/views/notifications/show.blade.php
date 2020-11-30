@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @forelse ($notifications as $notification)
                @if ($notification->type === 'App\Notifications\PaymentReceived')
                    <li>We have received a payment of {{ $notification->data['amount'] }} from you.</li>
                @endif
            @empty
                <li>You have no unread notifications at this time.</li>
            @endforelse
        </ul>
    </div>
@endsection
