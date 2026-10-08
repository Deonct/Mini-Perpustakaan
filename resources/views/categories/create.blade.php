@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2" style="font-size: 0.85rem; opacity: 0.8;">
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="text-white">Kategori</a></li>
                    <li class="breadcrumb-item active text-white">Tambah Baru</li>
                </ol>
            </nav>
            <h1 class="mb-1"><i class="bi bi-plus-circle me-2"></i>Tambah Kategori</h1>
            <p class="mb-0">Buat kategori buku baru untuk sistem perpustakaan</p>
        </div>
    </div>

    <div class="container fade-in">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <i class="bi bi-tag me-2 text-primary"></i>Formulir Kategori Baru
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('categories.store') }}" method="POST" id="form-create-category">
                            @csrf

                            {{-- Nama Kategori --}}
                            <div class="mb-4">
                                <label for="name" class="form-label">
                                    Nama Kategori <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Contoh: Pemrograman, Ilmu Komputer..."
                                    maxlength="100"
                                    autofocus
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text">Maksimal 100 karakter. Nama kategori harus unik.</div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-4">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description"
                                    rows="4"
                                    placeholder="Deskripsi singkat mengenai kategori ini (opsional)..."
                                >{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Actions --}}
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary" id="btn-cancel-category">
                                    <i class="bi bi-arrow-left me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary" id="btn-submit-category">
                                    <i class="bi bi-save me-1"></i>Simpan Kategori
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
