@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card p-4">
        <h3>Edit Barang</h3>

        <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ $barang->id_kategori == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>
@endsection
