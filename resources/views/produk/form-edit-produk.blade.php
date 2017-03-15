@extends('master')
@section('title', 'Edit Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-produk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-produk/proses-edit/{{$detail->id_produk}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Produk</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Produk</label>
                            </div>
                            <div class="col-md-6">
                                <input value="{{$detail->nama_produk}}" type="text" class="form-control" placeholder="text field" name="nama-produk">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Jenis Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori">
                                    @foreach($kategori as $value)
                                        <option value="{{$value->id_kategori}}">{{$value->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Harga Satuan</label>
                            </div>
                            <div class="col-md-6">
                                <input value="{{$detail->harga_satuan}}" type="number" class="form-control" placeholder="text field" name="harga-satuan">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="/data-produk" type="button" class="btn btn-default">Batal</a>
                        <a type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#hapus">Hapus</a>
                        {{--<a href="/data-produk/hapus/{{$detail->id_produk}}" class="btn btn-danger pull-right">Hapus</a>--}}
                    </div>

                    <!-- Modal Simpan -->
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

                    <!-- Modal Hapus -->
                    <div id="hapus" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Apakah Anda yakin?</h4>
                                </div>
                                <div class="modal-footer">
                                    <a href="/data-produk/hapus/{{$detail->id_produk}}" type="submit" class="btn btn-success">Ya</a>
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
