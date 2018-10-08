@extends('master')
@section('title', 'Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Produk {{$kategori->nama_kategori}}</h3>
            <div class="panel">
                <div class="panel-heading">
                    <a href="/data-produk/tambah" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Nama Kategori Produk</th>
                            <th>Harga Satuan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@php($i = 1)--}}
                        @foreach($produk as $value)
                            <tr>
                                {{--<td>{{$i++}}</td>--}}
                                <td>{{ (($produk->currentPage() - 1 ) * $produk->perPage() ) + $loop->iteration }}</td>
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
