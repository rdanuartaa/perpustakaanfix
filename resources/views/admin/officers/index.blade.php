<div class="card">
    <div class="card-header">
        <h5>Daftar Officer</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('officers.create') }}" class="btn btn-primary mb-2">Tambah Officer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officers as $officer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $officer->name }}</td>
                    <td>{{ $officer->email }}</td>
                    <td>
                        <a href="{{ route('officers.edit', $officer) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('officers.destroy', $officer) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>