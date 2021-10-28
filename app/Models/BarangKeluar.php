<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $fillable = ['id_barang', 'id_customer', 'satuan', 'jumblah', 'yg_mengeluarkan'];
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
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
