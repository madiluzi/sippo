@extends('master')
@section('title', 'Peramalan|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Peramalan</h3>
            <div class="row">
                <form action="/peramalan" method="post">
                    {!! csrf_field() !!}
                    <div class="col-md-2">
                        <select class="form-control input-sm" name="tahun">
                            <option value="" selected="selected">Pilih Tahun</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control input-sm" name="bulan">
                            <option value="" selected="selected">Pilih Bulan</option>
                            @php($i = 1)
                            @foreach($pilihBulan as $bln)
                                <option value="{{$i++}}">{{$bln}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control input-sm" name="kategori">
                            <option value="" selected="selected">Pilih Kategori Produk</option>
                            @foreach($kategori as $kat)
                                <option value={{$kat->id_kategori}}>{{$kat->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control input-sm" name="produk">
                            <option value="" selected="selected">Pilih Produk</option>
                            @foreach($produk as $prod)
                                <option value={{$prod->id_produk}}>{{$prod->nama_produk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">Ya</button>
                    </div>
                </form>
            </div>
        </div>

        <br>
        <div class="panel">
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Data Aktual (Xt)</th>
                        <th>Data Prediksi (St)</th>
                        <th>bt</th>
                        <th>Ftm</th>
                        <th>PE</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    @php ($i = 0)--}}
                    {{--@foreach($tampil as $value)--}}
                    @for($i = 0;$i < 6;$i++)
                        <tr>
                            <td>{{date("Y", strtotime($data[$i]->tgl_pesan))}}</td>
                            <td>{{date("M", strtotime($data[$i]->tgl_pesan))}}</td>
                            <td>{{$data[$i]->jumlah}}</td>
                            <td>{{$st[$i]}}</td>
                            <td>{{$bt[$i]}}</td>

                            @if($ftm[$i]==null)
                                <td>-</td>
                            @elseif($ftm[$i]!=null)
                                <td>{{$ftm[$i]}}</td>
                            @endif

                            @if($pe[$i]==null)
                                <td>-</td>
                            @elseif($pe[$i]!=null)
                                <td>{{$pe[$i]}}</td>
                            @endif
                        </tr>
                    @endfor
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
        <div id="toastr-demo" class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Safety Stock <a type="button" class="btn-toastr" data-context="info"
                                                                data-message="Safety stock adalah lorem ipsum dolor"
                                                                data-position="bottom-right">
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-cubes"></i></span>
                            <p>
                                <span class="number">1,252</span>
                                <span class="title">Barang</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reorder Point</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-line-chart"></i></span>
                            <p>
                                <span class="number">1,252</span>
                                <span class="title">Barang</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">MAPE</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
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