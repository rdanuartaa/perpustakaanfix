@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Pengguna</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="d-flex">
            <!-- Tombol Update -->
            <button type="submit" class="btn btn-success me-2">Update</button>

            <!-- Tombol Kembali -->
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
