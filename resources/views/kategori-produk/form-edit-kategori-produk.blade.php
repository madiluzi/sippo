@extends('master')
@section('title', 'Edit Data Jenis Barang|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Kategori Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-kategori-produk/edit/{{$kategori->id_kategori}}">
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
                                <input value="{{$kategori->nama_kategori}}" type="text" class="form-control"
                                       placeholder="nama kategori" name="nama-kategori" required>

                                @if ($errors->has('nama-kategori'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('nama-kategori') }}</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="/data-kategori-produk" type="button" class="btn btn-default">Batal</a>
                        <a type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#hapus">Hapus</a>
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
                                    <a href="/data-kategori-produk/hapus/{{$kategori->id_kategori}}" type="submit" class="btn btn-success">Ya</a>
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
