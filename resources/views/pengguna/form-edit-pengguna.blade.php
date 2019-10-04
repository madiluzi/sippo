@extends('master')
@section('title', 'Edit Data Kasir|Sistem Persediaan Kasir')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/data-pengguna" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Kasir</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-pengguna/edit/{{$pengguna->id}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Kasir</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Lengkap</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama-lengkap"
                                       value="{{$pengguna->name}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Pengguna</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama-pengguna"
                                       value="{{$pengguna->username}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">E-mail</label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email"
                                       value="{{$pengguna->email}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Kata Sandi</label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="{{url()->previous()}}" type="button" class="btn btn-default">Batal</a>
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
                                    <a href="/data-pengguna/hapus/{{$pengguna->id}}" type="submit"
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
