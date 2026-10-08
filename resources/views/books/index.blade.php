@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    {{-- ── Page Header ── --}}
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h1 class="mb-1"><i class="bi bi-book me-2"></i>Daftar Buku</h1>
                    <p class="mb-0">Manajemen inventaris buku perpustakaan digital</p>
                </div>
                <a href="{{ route('books.create') }}" class="btn btn-light fw-semibold shadow-sm" id="btn-add-book">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Buku
                </a>
            </div>
        </div>
    </div>

    <div class="container fade-in">

        {{-- ── Stats ── --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $books->count() }}</div>
                            <div class="stat-label mt-1">Total Judul Buku</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-book-fill"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #059669, #10b981);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $books->sum('stock') }}</div>
                            <div class="stat-label mt-1">Total Stok Buku</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-stack"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #0891b2, #06b6d4);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $books->pluck('category_id')->unique()->count() }}</div>
                            <div class="stat-label mt-1">Kategori Terpakai</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-tags-fill"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #dc2626, #ef4444);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $books->where('stock', 0)->count() }}</div>
                            <div class="stat-label mt-1">Stok Habis</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-exclamation-diamond-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Table ── --}}
        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><i class="bi bi-table me-2 text-primary"></i>Inventaris Buku</span>
                <span class="badge bg-primary rounded-pill">{{ $books->count() }} buku</span>
            </div>
            <div class="card-body p-0">
                @if ($books->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-book d-block"></i>
                        <h5>Belum Ada Buku</h5>
                        <p>Tambahkan buku pertama ke dalam sistem inventaris.</p>
                        <a href="{{ route('books.create') }}" class="btn btn-primary" id="btn-add-first-book">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Buku
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="books-table">
                            <thead>
                                <tr>
                                    <th class="ps-4" style="width: 50px">#</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th class="text-center" style="width: 100px">Tahun</th>
                                    <th>Kategori</th>
                                    <th class="text-center" style="width: 100px">Stok</th>
                                    <th class="text-center" style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $index => $book)
                                    <tr id="book-row-{{ $book->id }}">
                                        <td class="ps-4 text-muted fw-medium">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="fw-semibold text-dark" style="max-width: 280px;">
                                                {{ $book->title }}
                                            </div>
                                        </td>
                                        <td class="text-muted">{{ $book->author }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-secondary border">{{ $book->published_year }}</span>
                                        </td>
                                        <td>
                                            <span class="badge-category">
                                                <i class="bi bi-tag me-1"></i>{{ $book->category->name }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($book->stock === 0)
                                                <span class="badge-stock-zero">{{ $book->stock }}</span>
                                            @elseif ($book->stock <= 3)
                                                <span class="badge-stock-low">{{ $book->stock }}</span>
                                            @else
                                                <span class="badge-stock-ok">{{ $book->stock }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="action-btns d-inline-flex gap-1">
                                                <a href="{{ route('books.edit', $book) }}"
                                                   class="btn btn-warning btn-sm"
                                                   title="Edit"
                                                   id="btn-edit-book-{{ $book->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <form action="{{ route('books.destroy', $book) }}" method="POST" id="form-delete-book-{{ $book->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            title="Hapus"
                                                            id="btn-delete-book-{{ $book->id }}"
                                                            onclick="return confirm('Yakin ingin menghapus buku \'{{ addslashes($book->title) }}\'?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
