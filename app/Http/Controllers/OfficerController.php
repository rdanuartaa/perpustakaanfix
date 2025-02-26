<?php

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
            'jabatan' => 'required',
        ]);

        Officer::create($request->all());
        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function edit(Officer $officer)
    {
        return view('admin.officers.edit', compact('officer'));
    }

    public function update(Request $request, Officer $officer)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        $officer->update($request->all());
        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil diperbarui.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect()->route('admin.officers.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
