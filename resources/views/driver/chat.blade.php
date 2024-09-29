@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chat with Clients</h2>
    <div class="chat-box">
        @foreach($messages as $message)
            <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                <p>{{ $message->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
