<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index_laporan');
    }
    public function laporanPdf()
    {
        $dari =   Carbon::createFromFormat('Y-m-d', request()->input('dari'));
        $sampai = Carbon::createFromFormat('Y-m-d', request()->input('sampai'));
        if (request()->input('laporan') == 'masuk') {
            $dataMasuk = BarangMasuk::laporan($dari, $sampai);
            return PDF::loadView('admin.barang_masuk.reportPdf', compact('dataMasuk'))->stream('laporan_barang_masuk.pdf');
        } else {
            $barang_keluar = BarangKeluar::laporan($dari, $sampai);
            return PDF::loadView('admin.barang_keluar.reportPdf', compact('barang_keluar'))->stream('laporan_barang_keluar.pdf');
        }
    }
}
