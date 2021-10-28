<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $kode_barang = Barang::generateKode();
        return view('admin.barang.index_barang', compact('barang', 'kode_barang'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $create = Barang::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
            $barang->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }
    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $data = $request->except('_token');
        $barang->fill($data);
        if ($barang->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
