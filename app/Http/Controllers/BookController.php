<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::with('category')->latest()->get();

        return view('books.index', compact('books'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'published_year' => 'required|digits:4|integer|min:1000|max:'.(date('Y') + 1),
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book): View
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'published_year' => 'required|digits:4|integer|min:1000|max:'.(date('Y') + 1),
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
