@extends('master')
@section('title', 'Data Transaksi Barang Keluar|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Transaksi Barang Keluar</h3>
            <div class="panel">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($penjualan as $value)
                            <tr>
                                <td>{{ (($penjualan->currentPage() - 1 ) * $penjualan->perPage() ) + $loop->iteration }}</td>
                                <td>{{$value->pemesanan->tgl_pesan}}</td>
                                <td>{{$value->pemesanan->id_pemesanan}}</td>
                                <td>{{$value->produk->nama_produk}}</td>
                                <td>{{$value->produk->harga_satuan}}</td>
                                <td>{{$value->jumlah}}</td>
                                <td>{{$value->harga}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $penjualan->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection