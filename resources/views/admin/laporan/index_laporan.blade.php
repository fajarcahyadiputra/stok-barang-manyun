@extends('admin.layout')
@section('title','Halaman Laporan')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

    <div class="card">
        <div class="card-header">
            <h5>HALAMAN LAPORAN</h5>
        </div>
        <div class="card-body">
            <form action="{{route('laporanPdf')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="dari">Dari</label>
                    <input type="date" required name="dari" id="dari" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sampai">Sampai</label>
                    <input required type="date" name="sampai" id="sampai" class="form-control">
                </div>
                <div class="form-group">
                    <label for="laporan">Sampai</label>
                   <select required name="laporan" id="laporan" class="custom-select">
                       <option value="" disabled hidden selected>-- Pilih Laporan --</option>
                       <option value="masuk">Barang Masuk</option>
                       <option value="keluar">Barang Keluar</option>
                   </select>
                </div>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
    </div>
    <!---Container Fluid-->
</div>
@stop


@section('javascript')


@stop