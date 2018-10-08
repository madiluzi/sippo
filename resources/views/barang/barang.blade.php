@extends('master')
<title>Barang | Sistem Informasi Peramalan Persediaan Produk</title>
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Barang</h3>
            <div class="row">
                <div class="col-md-3">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Cari">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary"><i class="lnr lnr-magnifier"></i></button></span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <span>Tampilkan</span>
                    <select class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span>data</span>
                </div>

            </div>
            <div class="panel">
                <div class="panel-heading">
                    <a href="/data-barang/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th class="col-md-6">Nama Barang</th>
                            <th class="col-md-2">Nama Jenis</th>
                            <th class="col-md-2">Harga Satuan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($barang as $brg)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$brg->nama_barang}}</td>
                                <td>{{$brg->jenis->nama_jenis}}</td>
                                <td>Rp. {{$brg->harga_satuan}}</td>
                                <td>
                                    <a href="/data-barang/edit/{{$brg->id_barang}}"><span class="label label-warning">EDIT</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
