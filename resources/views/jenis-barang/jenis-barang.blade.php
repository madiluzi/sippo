@extends('master')
<title>Jenis Barang | Sistem Informasi Peramalan Persediaan Produk</title>
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Jenis Barang</h3>
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
                    <a href="/data-jenis-barang/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jenis Barang</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($jenis as $jns)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$jns->nama_jenis}}</td>
                                <td>
                                    <a href="/data-jenis-barang/edit/{{$jns->id_jenis}}"><span class="label label-warning">EDIT</span></a>
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