<title>laporan Barang Keluar</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">PT. CITRA LANGGENG SENTOSA</h2>
    <p>Jababeka Fase III</p>
    <p>Tekno 1 Blok B1-K Kawasan Industri Jababeka phase 3, Pasirgombong,</p>
    <p> Kec. Cikarang Utara, Bekasi, Jawa Barat 17530</p>
    <p>Tlp : (021) 89840277 Fax : (6221) 8984 0278</p>
</div>
<hr>
<br>
<center><h3>Laporan Barang Keluar</h3></center><hr/><br/>
<table  border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomer PO</th>
            <th>Nomer SJ</th>
            <th>Barang</th>
            <th>Jumblah</th>
            <th>Stok Sebelumnya</th>
            <th>Sisa Stok</th>
            <th>TGL Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barang_keluar as $no=>$dt)
        <tr>
            <td>{{$no+1}}</td>
            <td>{{$dt->no_po}}</td>
            <td>{{$dt->no_surat_jalan}}</td>
            <td>{{$dt->nama_barang}}</td>
            <td>{{$dt->jumblah}}</td>
            <td>{{$dt->jumblah_sebelumnya}}</td>
            <td>{{$dt->sisa_stok}}</td>
            <td>{{$dt->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>