@extends('master')
@section('title', 'Peramalan|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="page-title">Peramalan</h3>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="produk" id="produk">
                        <option value="" selected="selected">Pilih Produk</option>
                        @foreach($produk as $p)
                            <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="panel">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Total Penjualan</th>
                        <th>Peramalan</th>
                        <th>Nilai Error(MAPE)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0;$i < count($data);$i++)
                        <tr>
                            <td>{{date('l', strtotime($data[$i]->tgl_pesan))}}</td>
                            <td>{{date('d-F-y', strtotime($data[$i]->tgl_pesan))}}</td>
                            <td>{{$yt[$i]}}</td>
                            <td>{{$ftp[$i]}}</td>
                            <td>{{$pe[$i]}}</td>
                        </tr>
                    @endfor
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>

        <div id="toastr-demo" class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">MAPE</h3>
                        <div class="right">
                            <a type="button" class="btn-toastr" data-context="info"
                               data-message="MAPE (Mean Absolute Percentage Error) merupakan rata-rata dari keseluruhan
                               persentase kesalahan (selisih) antara data aktual dengan data hasil peramalan"
                               data-position="bottom-right"> <i class="fa fa-info-circle"></i>
                            </a>
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                            </button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-close"></i></span>
                            <p>
                                <span class="number">{{$mape}} %</span>
                                <span class="title">Tingkat Error</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#produk').change(function () {
            window.location = "/peramalan?id=" + $('#produk').val();
        });
    </script>
@endsection
