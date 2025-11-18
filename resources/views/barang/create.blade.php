@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card p-4">
        <h3>Tambah Barang</h3>
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga_barang" class="form-control" required>
            </div>

            <!-- Kolom Kategori -->
            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $kategorii)
                        <option value="{{ $kategorii->id }}">
                            {{ $kategorii->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
