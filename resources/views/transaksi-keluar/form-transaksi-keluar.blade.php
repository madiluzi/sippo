@extends('master')
@section('title', 'Tambah Data Produk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <a href="/transaksi-masuk" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
            <h3 class="page-title">Data Produk</h3>
            <div class="panel">
                <form class="form-horizontal" data-validate="parsley" method="post"
                      action="/transaksi-masuk/tambah">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Data Transaksi Masuk</h3>
                    </div>
                    <div class="panel-body">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="category" id="category">
                                    <option value="" selected="selected">Pilih Kategori Produk</option>
                                    @foreach($kategori as $k)
                                        <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="pull-right">Nama Produk</label>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="nama-produk">
                                    <option value="" selected="selected">Pilih Produk</option>
                                    @foreach($produk as $p)
                                        <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
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
                                <label class="pull-right">Jumlah</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="jumlah">
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
                <script language="JavaScript" type="text/JavaScript">

                    $('#category').change(function(e){
                        alert("sukses");
                        console.log(e);

                        var cat_id = e.target.value;

                        //ajax

                        $.get('/ajax-subcat?cat_id=' + id_kategori, function(data){  // Ganti bagian ini......

                            $('#subcategory').empty();

                            $.each(data, function(index, subcatObj){
                                $('#subcategory').append('<option value="'+subcatObj.id_kategori+'">'+subcatObj.nama_kategori+'</option>');
                            });
                        });
                    });

                </script>
            </div>
        </div>
    </div>
@endsection
