@extends('master')
<title>Tambah Jenis Barang | Sistem Informasi Peramalan Persediaan Produk</title>
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Jenis Barang</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/data-jenis-barang/proses-tambah">
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
                                <input type="text" class="form-control" placeholder="text field" name="nama-jenis">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <script type="text/javascript">
                            function cek() {
                                var msg = confirm("Apakah Anda yakin ?");
                                if (msg == true) {
                                    window.location = "/data-jenis-barang";
                                }
                                else {
                                    window.location = "#";
                                }
                            }
                        </script>
                        <button href="#" onclick="cek();" type="submit" class="btn btn-success btn-s-xs">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
