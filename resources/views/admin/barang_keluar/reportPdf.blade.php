<title>laporan Barang Keluar</title>
<div style="line-height: 7px; text-align: center; margin-bottom: 30px">
    <h2 style="font-weight: bold">PT. CITRA LANGGENG SENTOSA</h2>
    <p>Jababeka Fase III</p>
    <p>Tekno 1 Blok B1-K Kawasan Industri Jababeka phase 3, Pasirgombong,</p>
    <p> Kec. Cikarang Utara, Bekasi, Jawa Barat 17530</p>
    <p>Tlp :(62-21) 8983 0287 Fax : (62-21) 8983 0289</p>
</div>
<hr>
<br>
<center><h3>Laporan Barang Keluar</h3></center><hr/><br/>
<table  border="1" width="100%">
    <thead>
        <tr style="text-align: center">
            <th>No</th>
            <th>Nomer PO</th>
            <th>Barang</th>
            <th>Customer</th>
            <th>Pengirim</th>
            <th>Jumlah</th>
            <th>Stok Sebelumnya</th>
            <th>Sisa Stok</th>
            <th>TGL Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barang_keluar as $no=>$dt)
        <tr style="text-align: center">
            <td>{{$no+1}}</td>
            <td>{{$dt->no_po}}</td>
            <td>{{$dt->nama_barang}}</td>
            <td>{{$dt->nama}}</td>
            <td>{{$dt->yg_mengeluarkan}}</td>
            <td>{{$dt->jumblah}}</td>
            <td>{{$dt->jumblah_sebelumnya}}</td>
            <td>{{$dt->sisa_stok}}</td>
            <td>{{$dt->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>