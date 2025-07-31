@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-6">Available Materials</h2>

    {{-- Handouts --}}
    <h3 class="text-lg font-semibold mb-2">📄 Handouts</h3>
    @forelse ($handouts as $material)
        <div class="mb-4 border-b pb-2">
            <strong>{{ $material->title }}</strong><br>
            Level: {{ $material->level }}<br>
            <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="text-blue-600 underline">Download</a>
        </div>
    @empty
        <p class="text-gray-500">No handouts available.</p>
    @endforelse

    {{-- Textbooks --}}
    <h3 class="text-lg font-semibold mt-6 mb-2">📘 Textbooks</h3>
    @forelse ($textbooks as $material)
        <div class="mb-4 border-b pb-2">
            <strong>{{ $material->title }}</strong><br>
            Level: {{ $material->level }}<br>
            <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="text-blue-600 underline">Download</a>
        </div>
    @empty
        <p class="text-gray-500">No textbooks available.</p>
    @endforelse

    {{-- Past Questions --}}
    <h3 class="text-lg font-semibold mt-6 mb-2">📚 Past Questions</h3>
    @forelse ($pastQuestions as $material)
        <div class="mb-4 border-b pb-2">
            <strong>{{ $material->title }}</strong><br>
            Level: {{ $material->level }}<br>
            <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="text-blue-600 underline">Download</a>
        </div>
    @empty
        <p class="text-gray-500">No past questions available.</p>
    @endforelse
@endsection
