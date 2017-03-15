@extends('master')
@section('title', 'Tambah Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-produk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-produk/proses-tambah">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Produk</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Produk</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama-produk">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Kategori Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori">
                                @foreach($kategori as $jns)
                                        <option value="" selected="selected">Pilih Kategori Produk</option>
                                    <option value="{{$jns->id_kategori}}">{{$jns->nama_kategori}}</option>
                                @endforeach
                                </select>
                                {{--@foreach($kategori as $jns)--}}
                                    {{--<label class="fancy-radio">--}}
                                        {{--<input name="id_kategori" value="{{$jns->id_kategori}}" type="radio">--}}
                                        {{--<span><i></i> {{$jns->nama_kategori}} </span>--}}
                                    {{--</label>--}}
                                {{--@endforeach--}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Harga Satuan</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="harga-satuan">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Stok Unit</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="stok-unit">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Berat</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="berat">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Gambar</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="gambar">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Keterangan</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="keterangan" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="/data-produk" class="btn btn-default">Batal</a>
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
