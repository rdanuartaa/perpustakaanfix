<?php

// Controller untuk CRUD
namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('admin.officers.index', compact('officers'));
    }

    public function create()
    {
        return view('admin.officers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:officers,email',
            'phone' => 'required',
            'role' => 'required|in:admin,staff',
        ]);

        // Menggunakan nama kolom 'name' di database (bukan 'nama')
        $officer = new Officer();
        $officer->name = $request->nama;  // form field 'nama' disimpan ke kolom 'name'
        $officer->email = $request->email;
        $officer->phone = $request->phone;
        $officer->role = $request->role;
        $officer->save();

        // Redirect ke halaman admin
        return redirect()->to('/admin')->with('success', 'Officer berhasil ditambahkan.');
    }

    public function edit(Officer $officer)
    {
        return view('admin.officers.edit', compact('officer'));
    }

    public function update(Request $request, Officer $officer)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:officers,email,' . $officer->id,
            'phone' => 'required',
            'role' => 'required|in:admin,staff',
        ]);

        // Menggunakan nama kolom 'name' di database (bukan 'nama')
        $officer->name = $request->nama;  // form field 'nama' disimpan ke kolom 'name'
        $officer->email = $request->email;
        $officer->phone = $request->phone;
        $officer->role = $request->role;
        $officer->save();

        // Redirect ke halaman admin
        return redirect()->to('/admin')->with('success', 'Officer berhasil diupdate.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        // Redirect ke halaman admin
        return redirect()->to('/admin')->with('success', 'Officer berhasil dihapus.');
    }
}