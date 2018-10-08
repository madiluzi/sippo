@extends('master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-barang" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Barang</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-barang/proses-tambah">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Barang</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Barang</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="text field" name="nama-barang">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Jenis Barang</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="id_jenis">
                                    @foreach($jenis as $jns)
                                        <option value="{{$jns->id_jenis}}">{{$jns->nama_jenis}}</option>
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
                                <input type="number" class="form-control" placeholder="text field" name="harga-satuan">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#simpan">Open Modal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/data-barang" class="btn btn-default">Batal</a>
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
