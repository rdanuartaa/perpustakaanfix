@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Officer</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('officers.update', $officer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $officer->name) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $officer->email) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $officer->phone) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Pilih Role</option>
                    <option value="admin" {{ old('role', $officer->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ old('role', $officer->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('officers.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection