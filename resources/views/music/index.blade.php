@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">🎵 Your Recommended Songs</h1>
    <ul class="bg-white shadow rounded-lg p-4">
        @foreach($songs as $song)
            <li class="border-b py-2">
                <strong>{{ $song['title'] }}</strong> by {{ $song['artist'] }}
            </li>
        @endforeach
    </ul>
</div>
@endsection