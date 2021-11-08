<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        // $kode_barang = Barang::generateKode();
        return view('admin.barang_masuk.index_barang_masuk', compact('barang_masuk'));
    }
    public function halamanTambah()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('admin.barang_masuk.create_barang_masuk', compact('barang', 'supplier'));
    }
    public function store(Request $request)
    {
        if ($request->input('checkStok')) {
            $id_barang = $request->input('id_barang');
            $barang = barang::find($id_barang);
            return response()->json($barang);
        }
        $data = $request->except('_token');
        $barang = Barang::find($data['id_barang']);
        $create = BarangMasuk::create($data);
        $barang->fill([
            'jumblah' => $data['jumblah'] + $barang->jumblah
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
        $barang = BarangMasuk::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $barang = BarangMasuk::with('barang', 'supplier')->find($id);
        return response()->json($barang);
    }
    public function halamanEdit($id)
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        $barangmasuk = BarangMasuk::find($id);
        return view('admin.barang_masuk.edit_barang_masuk', compact('barang', 'supplier', 'barangmasuk'));
    }
    public function update($id, Request $request)
    {
        $barang = BarangMasuk::find($id);
        $data = $request->except('_token');
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
