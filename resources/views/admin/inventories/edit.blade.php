@extends('layouts.app')

@section('content')
<h1>Edit Inventaris</h1>
<form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama:</label>
    <input type="text" name="nama" value="{{ $inventory->nama }}" required>
    <label>Jumlah:</label>
    <input type="number" name="jumlah" value="{{ $inventory->jumlah }}" required>
    <button type="submit">Update</button>
</form>
@endsection
