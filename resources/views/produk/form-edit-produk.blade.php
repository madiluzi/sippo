@extends('master')
@section('title', 'Edit Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-produk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-produk/proses-edit/{{$produk->id_produk}}">
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
                                <input type="text" class="form-control" name="nama-produk"
                                       value="{{$produk->nama_produk}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Kategori Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori">
                                    <option value="">Pilih Kategori Produk</option>
                                    @foreach($kategori as $ktg)
                                        <option value="{{$ktg->id_kategori}}"
                                                @if($ktg->id_kategori==$produk->id_kategori) selected="selected"
                                                @endif
                                        >{{$ktg->nama_kategori}}</option>
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
                                <input type="number" class="form-control" name="harga-satuan"
                                       value="{{$produk->harga_satuan}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Berat</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="berat" value="{{$produk->berat}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Gambar</label>
                            </div>
                            <div class="col-md-6">
                                <img src="/images/{{$produk->gambar}}">
                                <br>
                                <input type="file" name="gambar">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Keterangan</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="keterangan"
                                          rows="4">{{$produk->keterangan}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="/data-produk" type="button" class="btn btn-default">Batal</a>
                        <a type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#hapus">Hapus</a>
                        {{--<a href="/data-produk/hapus/{{$produk->id_produk}}" class="btn btn-danger pull-right">Hapus</a>--}}
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
                                    <a href="/data-produk/hapus/{{$produk->id_produk}}" type="submit"
                                       class="btn btn-success">Ya</a>
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
