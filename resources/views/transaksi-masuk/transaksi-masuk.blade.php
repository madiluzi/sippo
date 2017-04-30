@extends('master')
@section('title', 'Data Transaksi Masuk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Transaksi Barang Masuk</h3>
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
                    <a href="/transaksi-masuk/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stok as $value)
                            <tr>
                                <td>{{ (($stok->currentPage() - 1 ) * $stok->perPage() ) + $loop->iteration }}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->produk->nama_produk}}</td>
                                <td>{{$value->jumlah_stok}}</td>
                                <td>
                                    <a href="/transaksi-masuk/edit/{{$value->id_stok}}"><span class="label label-warning">EDIT</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $stok->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection