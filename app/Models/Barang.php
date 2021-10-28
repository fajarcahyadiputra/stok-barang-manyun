<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'jumblah', 'keterangan', 'satuan'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public static function generateKode()
    {
        $kode_max = DB::select("SELECT MAX(RIGHT(kode_barang,4)) as kode_max FROM barang");
        if ($kode_max) {
            $kode_max =  collect($kode_max)->pluck('kode_max')->toArray()[0];
            $kode_interval =  (int) $kode_max + 1;
        } else {
            $kode_interval =  1;
        }
        return 'BRG' . str_pad($kode_interval, 4, '0', STR_PAD_LEFT);
    }
}