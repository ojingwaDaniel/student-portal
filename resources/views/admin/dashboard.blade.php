@extends('layouts.app')

@section('content')
    <h1>Welcome Admin</h1>
    <p>Here you can upload materials for students.</p>

    <a href="{{ route('materials.upload') }}">
        <x-primary-button class="ms-4">
            Upload Material
        </x-primary-button>
    </a>
@endsection
