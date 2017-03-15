@extends('master')
@section('title', 'Laporan|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Laporan Penjualan</h3>
            <div class="row">
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
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control input-sm" name="jenis">
                        <option value="" selected="selected">Pilih Jenis Barang</option>
                        @foreach($jenis as $jns)
                            <option value={{$jns->id_jenis}}>{{$jns->nama_jenis}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control input-sm" name="barang">
                        <option value="" selected="selected">Pilih Barang</option>
                        @foreach($barang as $brg)
                            <option value={{$brg->id_barang}}>{{$brg->nama_barang}}</option>
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
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Data Aktual</th>
                        <th>Data Prediksi</th>
                        <th>at</th>
                        <th>bt</th>
                        <th>Ftm</th>
                        <th>PE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ramal as $j)
                        <tr>
                            <td>{{date("Y", strtotime($j->tgl_jual))}}</td>
                            <td>{{date("M", strtotime($j->tgl_jual))}}</td>
                            <td>{{$j->jumlah}}</td>
                            <td>{{$j->jumlah}}</td>
                            <td>102</td>
                            <td>102</td>
                            <td>110</td>
                            <td>102</td>
                        </tr>
                    @endforeach
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
                        <h3 class="panel-title">MAPE</h3>
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
                                <span class="number">1,252 %</span>
                                <span class="title">Tingkat Error</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection