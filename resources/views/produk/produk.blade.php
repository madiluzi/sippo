@extends('master')
@section('title', 'Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Produk</h3>
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
                    <a href="/data-produk/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th class="col-md-6">Nama Produk</th>
                            <th class="col-md-2">Nama Jenis</th>
                            <th class="col-md-2">Harga Satuan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($produk as $value)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$value->nama_produk}}</td>
                                <td>{{$value->kategori->nama_kategori}}</td>
                                <td>Rp. {{$value->harga_satuan}}</td>
                                <td>
                                    <a href="/data-produk/edit/{{$value->id_produk}}"><span class="label label-warning">EDIT</span></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {!! $produk->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
