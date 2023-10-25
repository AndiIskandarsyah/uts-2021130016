@extends('layouts.template')

@section('title', 'Tentang Perpustakaan') <!-- Mengganti judul halaman -->

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="row mb-2">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Selamat Datang di Perpustakaan</h1> <!-- Menambah judul selamat datang -->
                <p class="lead my-3">Kami menyediakan akses ke beragam koleksi buku dan sumber daya bermanfaat.</p> <!-- Tambahkan deskripsi perpustakaan -->
                <p class="lead mb-0">
                    <a href="#" class="text-white fw-bold">
                        Telusuri lebih lanjut...
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <!-- Isi gambar atau konten visual yang relevan tentang perpustakaan -->
            </div>
        </div>
    </div>

    {{-- Artikel Perpustakaan --}}
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">Berita Terbaru</strong> <!-- Ganti kategori "World" dengan "Berita Terbaru" -->
                    <h3 class="mb-0">Judul Artikel Terbaru</h3> <!-- Ganti judul artikel -->
                    <div class="mb-1 text-muted">Tanggal Terbit</div> <!-- Ganti tanggal terbit -->
                    <p class="card-text mb-auto">Deskripsi artikel singkat.</p> <!-- Ganti deskripsi artikel -->
                    <a href="#" class="stretched-link">Baca selengkapnya</a> <!-- Ganti link "Continue reading" dengan "Baca selengkapnya" -->
                </div>
                <div class="col-auto d-none d-lg-block">
                    <!-- Isi gambar artikel atau konten visual yang relevan -->
                </div>
            </div>
        </div>
    </div>
@endsection
