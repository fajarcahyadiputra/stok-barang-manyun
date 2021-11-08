@extends('admin.layout')
@section('title','Halaman Tambah Barang Masuk')

@section('content')
<div class="container-fluid" id="container-wrapper">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5>TAMBAH BARANG MASUK</h5>
        </div>
        <div class="card-body">
            <form id="formTambah" method="post">
                @csrf()
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_po">Nomer PO</label>
                        <input required type="type" value="" name="no_po" id="no_po" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="no_surat_jalan">Nomer Surat Jalan</label>
                        <input required type="type" value="" name="no_surat_jalan" id="no_surat_jalan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_barang">Barang</label>
                        <select required name="id_barang" id="id_barang" class="form-control">
                            <option value="" disabled selected hidden>-- Pilih Barang --</option>
                            @foreach ($barang as $br)
                             <option value="{{$br->id}}">{{$br->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_supplier">Supplier</label>
                        <select required name="id_supplier" id="id_supplier" class="form-control">
                            <option value="" disabled selected hidden>-- Pilih Barang --</option>
                            @foreach ($supplier as $sup)
                             <option value="{{$sup->id}}">{{$sup->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumblah">Jumblah</label>
                        <input required type="number" min="1" name="jumblah" id="jumblah"  value="1" class="form-control">
                        <span class="alert-barang-kosong text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="jumblah_sebelumnya">Jumblah Sebelumnya</label>
                        <input readonly type="number" required name="jumblah_sebelumnya" id="jumblah_sebelumnya" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="total_stok">Total</label>
                        <input readonly type="number"  required name="total_stok" id="total_stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input type="text" required name="penerima" id="penerima" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select required name="satuan" class="form-control" id="satuan">
                            <option value="" disabled hidden selected>-- Pilih Satuan --</option>
                            <option value="pcs">pcs</option>
                            <option value="btg">btg</option>
                            <option value="lb">lb</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a  class="btn btn-secondary" href="/barang-masuk">Cancle</a>
                    <button  id="btn-add" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){

        $(document).on('submit', '#formTambah',  function(e) {
            e.preventDefault();
            const data = $(this).serialize();

            $.ajax({
                url: '/barang-masuk',
                data: data,
                dataType: 'json',
                type: 'post',
                success: function(hasil) {
                    if (hasil) {
                        $('#modalTambah').modal('hide')
                        Swal.fire(
                            'sukses',
                            'sukses menambah data',
                            'success'
                        ).then(()=>{
                            document.location.href = '/barang-masuk';
                        })
                    } else {
                        Swal.fire(
                            'Gagal',
                            'gagal menambah data',
                            'error'
                        )
                    }
                }
            })
        })
        //end

        //check stok
        $(document).on('keyup change', '#jumblah', function(){
            const id_barang = $('#id_barang').val();
            var jumblah_masuk = $('#jumblah').val();
            console.log(jumblah_masuk);
            $('.alert-barang-kosong').html(``);
            if(id_barang === undefined || id_barang === '' || id_barang === null){
                $('.alert-barang-kosong').html(`Barang Harus Di Pilih Dahulu`);
                $('#btn-add').attr('disabled','disabled');
                return false;
            }
            $.ajax({
                url: '/barang-masuk',
                data: {
                    checkStok: true,
                    id_barang,
                    _token: "{{csrf_token()}}"
                },
                dataType: 'json',
                type: 'post',
                success: function (result){
                    let jumblah = result.jumblah;
                    $('#jumblah_sebelumnya').val(jumblah);
                    const total = parseInt(jumblah) + parseInt(jumblah_masuk);
                    $('#total_stok').val(total);
                }
            })
        })
        })
    </script>
@endsection
