<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
public function create()
{
return view('admin.lecturers.create');
}

public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users',
'password' => 'required|string|min:6|confirmed',
]);

User::create([
'name' => $request->name,
'email' => $request->email,
'matric_number' => null,
'level' => null,
'password' => Hash::make($request->password),
'is_admin' => true,
]);

return redirect()->route('admin.dashboard')->with('success', 'Lecturer account created successfully.');
}
}
