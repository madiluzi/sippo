@extends('master')
@section('title', 'Data Kasir|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Kasir</h3>
            <div class="row">
                <div class="col-md-3">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Temukan...">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary">Cari</button></span>
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
                    <a href="/data-pengguna/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nama Pengguna</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengguna as $value)
                            <tr>
                                <td>1</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->username}}</td>
                                <td>{{$value->email}}</td>
                                <td>
                                    <a href="/data-pengguna/edit/{{$value->id}}"><span class="label label-warning">EDIT</span></a>
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