<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluar = BarangKeluar::with('customer', 'barang')->get();
        // $kode_barang = Barang::generateKode();
        return view('admin.barang_keluar.index_barang_keluar', compact('barang_keluar'));
    }
    public function halamanTambah()
    {
        $barang = Barang::all();
        $customer = Customer::all();
        $no_po = BarangKeluar::generateNoPo();
        $no_sj = BarangKeluar::generateSJ();
        return view('admin.barang_keluar.create_barang_keluar', compact('barang', 'customer', 'no_sj', 'no_po'));
    }
    public function store(Request $request)
    {
        if ($request->input('checkStok')) {
            $id_barang = $request->input('id_barang');
            $barang = barang::find($id_barang);
            return response()->json($barang);
        }
        $data = $request->except('_token', 'tgl_keluar');
        $data['created_at'] = $request->input('tgl_keluar') . date('H:m:i');
        $barang = Barang::find($data['id_barang']);
        $create = BarangKeluar::create($data);
        $barang->fill([
            'jumblah' =>  $barang->jumblah - $data['jumblah']
        ]);
        if ($create) {
            $barang->save();
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $barang = BarangKeluar::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $barang = BarangKeluar::with('barang', 'customer')->find($id);
        return response()->json($barang);
    }
    public function halamanEdit($id)
    {
        $barang = Barang::all();
        $customer = Customer::all();
        $barangkeluar = BarangKeluar::find($id);
        return view('admin.barang_keluar.edit_barang_keluar', compact('barang', 'customer', 'barangkeluar'));
    }
    public function update($id, Request $request)
    {
        $data = $request->except('_token', 'tgl_keluar');
        $barang = BarangKeluar::find($id);
        $data['created_at'] = $request->input('tgl_keluar') . date('H:m:i');
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function laporanSuratjalan($id)
    {
        $barang_keluar = BarangKeluar::with('barang', 'customer')->find($id);
        return view('admin.barang_keluar.surat_jalan', compact('barang_keluar'));
    }
}
