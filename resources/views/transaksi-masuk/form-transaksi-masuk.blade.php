@extends('master')
@section('title', 'Tambah Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/transaksi-masuk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/transaksi-masuk/tambah/{{$stok->id_produk}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Transaksi Masuk</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Kategori Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori" id="kategori" disabled>
                                    <option value="{{$stok->id_kategori}}" selected="selected">{{$stok->kategori->nama_kategori}}</option>

                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="produk" id="produk" disabled>
                                    <option value="{{$stok->id_produk}}" selected="selected">{{$stok->nama_produk}}</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Jumlah Produk Masuk</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="jumlah">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a type="button" class="btn btn-success" data-toggle="modal" data-target="#simpan">Simpan</a>
                        <a href="{{url()->previous()}}" class="btn btn-default">Batal</a>
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

@section('script')
    <script>
        $('#kategori').on('change', function (e) {
            var id_kategori = e.target.value;
            $.get('{{ url('information') }}/create/ajax-produk?id_kategori=' + id_kategori, function (data) {
                $('#produk').empty();
                $.each(data, function (index, subCatObj) {
                    $('#produk').append("<option value='" + subCatObj.id_produk + "'> " + subCatObj.nama_produk + "");  //nambah optionnya
                });
            });
        });
    </script>
@endsection