<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return response()->json($users);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User berhasil ditambahkan!', 'user' => $user], 201);
    }

  
    public function show(User $user)
    {
        return response()->json($user);
    }

   
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        $user->update($request->only(['name', 'email', 'password']));
    
        return response()->json(['message' => 'User updated successfully', 'data' => $user]);
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User berhasil dihapus.']);
    }
}
