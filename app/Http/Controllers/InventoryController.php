<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('admin.inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('admin.inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
        ]);

        Inventory::create($request->all());
        return redirect()->route('admin.inventories.index')->with('success', 'Inventaris berhasil ditambahkan.');
    }

    public function edit(Inventory $inventory)
    {
        return view('admin.inventories.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $inventory->update($request->all());
        return redirect()->route('admin.inventories.index')->with('success', 'Inventaris berhasil diperbarui.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('admin.inventories.index')->with('success', 'Inventaris berhasil dihapus.');
    }
}
