<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('admin.books.index', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.books.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        $book = new Book();
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->category_id = $validatedData['category_id'];
        $book->stock = $validatedData['stock'];
        $book->save();

        return redirect()->to('/admin')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Book $book)
    {
        return redirect()->to('/admin')->with('success');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.books.edit', ['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->category_id = $validatedData['category_id'];
        $book->stock = $validatedData['stock'];
        $book->save();

        return redirect()->to('/admin')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->to('/admin')->with('success', 'Buku berhasil dihapus.');
    }
}
