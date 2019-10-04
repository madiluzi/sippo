@extends('master')
@section('title', 'Tambah Data Jenis Barang|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-kategori-produk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Kategori Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-kategori-produk/tambah">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Kategori Produk</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="pull-right">Nama Kategori Produk</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama-kategori"
                                       value="{{ old('nama-kategori') }}">
                                @if ($errors->has('nama-kategori'))
                                    <span class="label label-danger">{{ $errors->first('nama-kategori') }}</span>
                                @endif
                            </div>
                        </div>
                        {{--<br>--}}
                        {{--<ul>--}}
                            {{--@foreach($errors->all() as $error)--}}
                                {{--<span class="label label-danger">{{$error}}</span>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    </div>

                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="/data-kategori-produk" class="btn btn-default">Batal</a>
                    </div>

                    <!-- Modal -->
                    <div id="simpan" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Apakah Anda yakin?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ya</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
