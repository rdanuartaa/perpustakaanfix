@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard Admin Perpustakaan</h2>

    <!-- Tab Navigasi -->
    <ul class="nav nav-tabs" id="adminTab">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#books">Books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#category">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#inventory">Inventory</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#officer">Officer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#user">User</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4">
        <div id="books" class="tab-pane fade show active">
            @include('admin.books.index', ['books' => $books])
        </div>
        <div id="category" class="tab-pane fade">
            @include('admin.categories.index', ['categories' => $categories])
        </div>
        <div id="inventory" class="tab-pane fade">
            @include('admin.inventories.index', ['inventories' => $inventories])
        </div>
        <div id="officer" class="tab-pane fade">
            @include('admin.officers.index', ['officers' => $officers])
        </div>
        <div id="user" class="tab-pane fade">
            @include('admin.users.index', ['users' => $users])
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap & Script -->
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<!-- Script untuk menyimpan tab terakhir yang diklik -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Ambil tab yang terakhir diklik dari localStorage
    var activeTab = localStorage.getItem("activeTab");
    if (activeTab) {
        var tab = new bootstrap.Tab(document.querySelector(`a[href="${activeTab}"]`));
        tab.show();
    }

    // Simpan tab yang diklik ke localStorage
    document.querySelectorAll("#adminTab a").forEach(tab => {
        tab.addEventListener("click", function () {
            localStorage.setItem("activeTab", this.getAttribute("href"));
        });
    });
});
</script>

@endsection
