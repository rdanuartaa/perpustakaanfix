@extends('layouts.app')

@section('content')
<h1>Tambah Inventaris</h1>
<form action="{{ route('inventories.store') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="nama" required>
    <label>Jumlah:</label>
    <input type="number" name="jumlah" required>
    <button type="submit">Simpan</button>
</form>
@endsection
