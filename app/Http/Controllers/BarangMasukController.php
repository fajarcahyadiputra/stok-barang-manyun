<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
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

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $create = BarangMasuk::create($data);
        if ($create) {
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
        $barang = BarangMasuk::find($id);
        return response()->json($barang);
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
