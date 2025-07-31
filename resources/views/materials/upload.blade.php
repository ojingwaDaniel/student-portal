@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Upload Material</h1>

    @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="text-red-600 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-semibold">Title</label>
            <input type="text" name="title" id="title" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="level" class="block font-semibold">Level</label>
            <select name="level" id="level" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Select Level --</option>
                <option value="100L">100L</option>
                <option value="200L">200L</option>
                <option value="300L">300L</option>
                <option value="400L">400L</option>
                <option value="500L">500L</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="category" class="block font-semibold">Category</label>
            <select name="category" id="category" class="w-full border rounded p-2" required>
                <option value="" disabled selected>-- Select Category --</option>
                <option value="handout">Handout</option>
                <option value="textbook">Textbook</option>
                <option value="past_question">Past Question</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="file" class="block font-semibold">Upload File (PDF, DOCX, etc.)</label>
            <input type="file" name="file" id="file" class="w-full" required>
        </div>

        <x-primary-button>Upload</x-primary-button>
    </form>
@endsection
