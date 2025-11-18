<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tabel_barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = true; // karena id_barang auto increment
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_barang',
        'id_kategori',
    ];

    // RELASI
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
