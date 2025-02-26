<div class="card">
    <div class="card-header">
        <h5>Daftar Inventory</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('inventories.create') }}" class="btn btn-primary mb-2">Tambah Inventory</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventory->nama }}</td>
                    <td>{{ $inventory->jumlah }}</td>
                    <td>
                        <a href="{{ route('inventories.edit', $inventory) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('inventories.destroy', $inventory) }}" method="POST" class="d-inline">
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
