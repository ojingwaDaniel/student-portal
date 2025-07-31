<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function create()
{
return view('admin.create');
}

public function store(Request $request)
{
$request->validate([
'name' => 'required|string',
'email' => 'required|email|unique:users',
'role' => 'required|in:admin,lecturer',
'password' => 'required|string|min:6',
]);

User::create([
'name' => $request->name,
'email' => $request->email,
'role' => $request->role,
'is_admin' => $request->role === 'admin',
'password' => Hash::make($request->password),
]);

return back()->with('success', 'User added successfully.');
}
}
