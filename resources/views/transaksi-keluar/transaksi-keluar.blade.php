@extends('master')
@section('title', 'Data Transaksi Barang Keluar|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Transaksi Barang Keluar</h3>
            <div class="row">
                <div class="col-md-3">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Cari">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary"><i
                                            class="lnr lnr-magnifier"></i></button></span>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 col-md-offset-2">
                    <label>Tampilkan</label>
                    <select class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <label>data</label>
                </div>

            </div>
            <div class="panel">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
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