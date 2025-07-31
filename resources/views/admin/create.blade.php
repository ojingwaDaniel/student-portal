@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Create Admin or Lecturer</h2>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.store') }}" class="space-y-4">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" class="w-full border px-3 py-2" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" class="w-full border px-3 py-2" required>
        </div>

        <div>
            <label>Role:</label>
            <select name="role" class="w-full border px-3 py-2" required>
                <option value="admin">Admin</option>
                <option value="lecturer">Lecturer</option>
            </select>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" class="w-full border px-3 py-2" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Create User</button>
    </form>
</div>
@endsection
