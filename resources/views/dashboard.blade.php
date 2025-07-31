@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white shadow rounded">
        <h3 class="text-lg font-bold mb-4">Welcome, {{ $user->name }}</h3>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Matric Number:</strong> {{ $user->matric_number }}</li>
            <li><strong>Level:</strong> {{ $user->level }}</li>
        </ul>
    </div>
@endsection
