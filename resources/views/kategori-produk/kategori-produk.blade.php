@extends('master')
@section('title', 'Data Ketegori Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Ketegori Produk</h3>
            @if (session('tambah'))
                <div class="alert alert-success">
                    {{ session('tambah') }}
                </div>
            @elseif (session('edit'))
                <div class="alert alert-success">
                    {{ session('edit') }}
                </div>
            @elseif (session('hapus'))
                <div class="alert alert-success">
                    {{ session('hapus') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-heading">
                    <a href="/data-kategori-produk/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori Produk</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kategori as $value)
                            <tr>
                                <td>{{ (($kategori->currentPage() - 1 ) * $kategori->perPage() ) + $loop->iteration }}</td>
                                <td><a href="/data-produk/{{$value->id_kategori}}">{{$value->nama_kategori}}</a></td>
                                <td>
                                    <a href="/data-kategori-produk/edit/{{$value->id_kategori}}"><span
                                                class="label label-warning">EDIT</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $kategori->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection