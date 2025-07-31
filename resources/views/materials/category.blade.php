@extends('layouts.app')

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">{{ $title }}</h2>

            <ul class="space-y-4">
                @forelse ($materials as $material)
                    <li class="p-4 bg-white shadow rounded">
                        <h3 class="text-lg font-bold">{{ $material->title }}</h3>
                        <p class="text-sm text-gray-600">Level: {{ $material->level }}</p>
                        <a href="{{ asset('storage/' . $material->file_path) }}"
                           class="text-blue-500 underline"
                           target="_blank">
                            📎 View / Download
                        </a>
                    </li>
                @empty
                    <li class="p-4 bg-white shadow rounded text-gray-500 text-center">
                        No {{ strtolower($title) }} available for your level ({{ auth()->user()->level }}).
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
