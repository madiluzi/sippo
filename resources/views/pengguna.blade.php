@extends('master')
@section('title', 'Data Pengguna|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Pengguna</h3>

            <div class="panel">
                <div class="panel-heading">
                    <a href="" class="btn btn-primary">Tambah</a>
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
                                    <a href="/data-produk/edit/{{$value->id_produk}}"><span class="label label-warning">EDIT</span></a>
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