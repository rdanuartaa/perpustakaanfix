@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Buku</h2>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="title" class="form-control mb-3" value="{{ $book->title }}" required>
        <input type="text" name="author" class="form-control mb-3" value="{{ $book->author }}" required>
        <select name="category_id" class="form-control mb-3">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
