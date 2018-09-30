@extends('master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Peramalan Bulan Depan</h3>

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
                        <tr>
                            <td>2016</td>
                            <td>Agustus</td>
                            <td>102</td>
                            <td>110</td>
                            <td>102</td>
                            <td>102</td>
                            <td>110</td>
                            <td>102</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="toastr-demo" class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Safety Stock <a type="button" class="btn-toastr" data-context="info" data-message="Safety stock adalah lorem ipsum dolor" data-position="bottom-right">
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
    </div>
@endsection