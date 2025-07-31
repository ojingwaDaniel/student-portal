@extends('layouts.app')

@section('content')
    <h1>Welcome Lecturer</h1>
    <p>Here you can upload materials too.</p>
    <a href="{{ route('materials.upload') }}">
        <x-primary-button class="ms-4">
            Upload Material
        </x-primary-button>
    </a>
@endsection
