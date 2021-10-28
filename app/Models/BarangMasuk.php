<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $fillable = ['id_barang', 'id_supplier', 'no_po', 'satuan', 'jumblah', 'no_surat_jalan', 'penerima'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
    public function customer()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}
