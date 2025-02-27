@extends('layouts.app')

@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- ✅ Tambahkan input password di sini -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" 
               class="form-control @error('password') is-invalid @enderror" 
               required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
