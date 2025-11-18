<?php

namespace App\Models;

use App\Models\Barang;   
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id', 'id');
    }
}
