<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="datatable">
            <thead>
                <tr>
                    <th >No</th>
                    <th>Nama</th>
                    {{-- <th>Jumlah Awal</th> --}}
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    @if(auth()->user()->role == 'super-admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $no=>$dt)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$dt->nama_barang}}</td>
                    {{-- <td>{{$dt->stok_awal}}</td> --}}
                    <td>{{$dt->jumblah}}</td>
                    <td>{{$dt->keterangan}}</td>
                    <td>{{$dt->satuan}}</td>
                    @if(auth()->user()->role == 'super-admin')
                    <td class="text-center">
                        <button data-id="{{$dt->id}}" id="btn-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button data-id="{{$dt->id}}" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>