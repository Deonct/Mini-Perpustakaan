@extends('layouts.app')

@section('title', 'Edit Buku — ' . $book->title)

@section('content')
    <div class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2" style="font-size: 0.85rem; opacity: 0.8;">
                    <li class="breadcrumb-item"><a href="{{ route('books.index') }}" class="text-white">Daftar Buku</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
            </nav>
            <h1 class="mb-1"><i class="bi bi-pencil-square me-2"></i>Edit Buku</h1>
            <p class="mb-0">Perbarui informasi buku: <strong>{{ $book->title }}</strong></p>
        </div>
    </div>

    <div class="container fade-in">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <i class="bi bi-pencil me-2 text-warning"></i>Formulir Edit Buku
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('books.update', $book) }}" method="POST" id="form-edit-book-{{ $book->id }}">
                            @csrf
                            @method('PUT')

                            {{-- Judul --}}
                            <div class="mb-4">
                                <label for="title" class="form-label">
                                    Judul Buku <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $book->title) }}"
                                    placeholder="Masukkan judul buku..."
                                    maxlength="255"
                                    autofocus
                                >
                                @error('title')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Pengarang --}}
                            <div class="mb-4">
                                <label for="author" class="form-label">
                                    Pengarang <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('author') is-invalid @enderror"
                                    id="author"
                                    name="author"
                                    value="{{ old('author', $book->author) }}"
                                    placeholder="Nama pengarang buku..."
                                    maxlength="100"
                                >
                                @error('author')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- Tahun Terbit --}}
                                <div class="col-md-6 mb-4">
                                    <label for="published_year" class="form-label">
                                        Tahun Terbit <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control @error('published_year') is-invalid @enderror"
                                        id="published_year"
                                        name="published_year"
                                        value="{{ old('published_year', $book->published_year) }}"
                                        placeholder="Contoh: 2023"
                                        min="1000"
                                        max="{{ date('Y') + 1 }}"
                                    >
                                    @error('published_year')
                                        <div class="invalid-feedback">
                                            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Format 4 digit (misal: 2023).</div>
                                </div>

                                {{-- Stok --}}
                                <div class="col-md-6 mb-4">
                                    <label for="stock" class="form-label">
                                        Stok <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control @error('stock') is-invalid @enderror"
                                        id="stock"
                                        name="stock"
                                        value="{{ old('stock', $book->stock) }}"
                                        placeholder="Jumlah stok..."
                                        min="0"
                                    >
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Kategori --}}
                            <div class="mb-4">
                                <label for="category_id" class="form-label">
                                    Kategori <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id"
                                    name="category_id"
                                >
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary" id="btn-cancel-edit-book">
                                    <i class="bi bi-arrow-left me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-warning" id="btn-submit-edit-book">
                                    <i class="bi bi-save me-1"></i>Perbarui Buku
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
