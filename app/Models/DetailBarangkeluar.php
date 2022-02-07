<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailBarangkeluar extends Model
{
    use HasFactory;
    protected $table = 'detail_barang_keluar';
    protected $fillable = ['id_barang_keluar', 'id_barang', 'satuan', 'jumblah', 'jumblah_sebelumnya', 'sisa_stok'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public static function laporan($dari, $sampai)
    {
        return DB::table('detail_barang_keluar')
            ->select("detail_barang_keluar.*", "barang_keluar.no_po", "barang_keluar.no_surat_jalan", "barang_keluar.yg_mengeluarkan", "barang.nama_barang", "customer.nama")
            ->join('barang', "detail_barang_keluar.id_barang", "=", "barang.id")
            ->join('barang_keluar', "detail_barang_keluar.id_barang_keluar", "=", "barang_keluar.id")
            ->join('customer', "barang_keluar.id_customer", "=", "customer.id")
            ->whereBetween('barang_keluar.created_at', [$dari, $sampai])
            ->get();
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
