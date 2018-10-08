@extends('master')
<title>Edit Jenis Barang | Sistem Informasi Peramalan Persediaan Produk</title>
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Jenis Barang</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-jenis-barang/proses-edit/{{$detail->id_jenis}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Jenis Barang</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <label class="pull-right">Nama Jenis Barang</label>
                            </div>
                            <div class="col-md-6">
                                <input value="{{$detail->nama_jenis}}" type="text" class="form-control" placeholder="text field" name="nama-jenis">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/data-jenis-barang" class="btn btn-default">Batal</a>
                        <a href="/data-jenis-barang/hapus/{{$detail->id_jenis}}" class="btn btn-danger pull-right">Hapus</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
