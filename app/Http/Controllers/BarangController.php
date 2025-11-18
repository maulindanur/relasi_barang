<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {
        $search = $request->search;
        
        $barang = Barang::with('kategori')->where('nama_barang', 'LIKE', "%{$search}%")
                       ->orWhere('kode_barang', 'LIKE', "%{$search}%")
                       ->paginate(2);
        return view('barang.index', compact('barang', 'search'));
    }

    // Form tambah data
    public function create()
{
    $kategori = Kategori::all();
    return view('barang.create', compact('kategori'));
}


    // Simpan data baru
    public function store(Request $request)
{
    $request->validate([
        'kode_barang'   => 'required',
        'nama_barang'   => 'required',
        'harga_barang'  => 'required|numeric',
        'id_kategori'   => 'required|exists:kategori,id', // validasi kategori
    ]);

    Barang::create([
        'kode_barang'   => $request->kode_barang,
        'nama_barang'   => $request->nama_barang,
        'harga_barang'  => $request->harga_barang,
        'id_kategori'   => $request->id_kategori, // simpan kategori
    ]);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
}

    // Form edit data
    public function edit($id)
{
    $barang = Barang::findOrFail($id);
    $kategori = Kategori::all();

    return view('barang.edit', compact('barang', 'kategori'));
}


    // Update data
public function update(Request $request, $id)
{
    $request->validate([
        'kode_barang' => 'required',
        'nama_barang' => 'required',
        'harga_barang' => 'required|numeric',
        'id_kategori' => 'required|exists:kategori,id',
    ]);

    $barang = Barang::findOrFail($id);

    $barang->update([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'harga_barang' => $request->harga_barang,
        'id_kategori' => $request->id_kategori,
    ]);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
}


    // Hapus data
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
