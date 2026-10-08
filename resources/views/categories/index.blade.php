@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    {{-- ── Page Header ── --}}
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h1 class="mb-1"><i class="bi bi-tags me-2"></i>Manajemen Kategori</h1>
                    <p class="mb-0">Kelola kategori buku dalam sistem perpustakaan</p>
                </div>
                <a href="{{ route('categories.create') }}" class="btn btn-light fw-semibold shadow-sm" id="btn-add-category">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                </a>
            </div>
        </div>
    </div>

    <div class="container fade-in">

        {{-- ── Stats Row ── --}}
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $categories->count() }}</div>
                            <div class="stat-label mt-1">Total Kategori</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-tags-fill"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="stat-card" style="background: linear-gradient(135deg, #0891b2, #06b6d4);">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="stat-value">{{ $categories->sum('books_count') }}</div>
                            <div class="stat-label mt-1">Total Buku Terdaftar</div>
                        </div>
                        <div class="stat-icon"><i class="bi bi-book-fill"></i></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Table ── --}}
        <div class="card shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span><i class="bi bi-list-ul me-2 text-primary"></i>Semua Kategori</span>
                <span class="badge bg-primary rounded-pill">{{ $categories->count() }} kategori</span>
            </div>
            <div class="card-body p-0">
                @if ($categories->isEmpty())
                    <div class="empty-state">
                        <i class="bi bi-tags d-block"></i>
                        <h5>Belum Ada Kategori</h5>
                        <p>Mulai dengan menambahkan kategori pertama Anda.</p>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary" id="btn-add-first-category">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="categories-table">
                            <thead>
                                <tr>
                                    <th class="ps-4" style="width: 50px">#</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center" style="width: 120px">Jumlah Buku</th>
                                    <th class="text-center" style="width: 160px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr id="category-row-{{ $category->id }}">
                                        <td class="ps-4 text-muted fw-medium">{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge-category">
                                                <i class="bi bi-tag me-1"></i>{{ $category->name }}
                                            </span>
                                        </td>
                                        <td class="text-muted" style="max-width: 300px;">
                                            {{ $category->description ?? '—' }}
                                        </td>
                                        <td class="text-center">
                                            @if ($category->books_count > 0)
                                                <span class="badge bg-primary rounded-pill">{{ $category->books_count }} buku</span>
                                            @else
                                                <span class="badge bg-secondary rounded-pill">0 buku</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="action-btns d-inline-flex gap-1">
                                                <a href="{{ route('categories.edit', $category) }}"
                                                   class="btn btn-warning btn-sm"
                                                   title="Edit"
                                                   id="btn-edit-category-{{ $category->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST" id="form-delete-category-{{ $category->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            title="Hapus"
                                                            id="btn-delete-category-{{ $category->id }}"
                                                            onclick="return confirm('Yakin ingin menghapus kategori \'{{ addslashes($category->name) }}\'?\n\nPerhatian: Tidak dapat dihapus jika masih ada buku terkait!')">
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
