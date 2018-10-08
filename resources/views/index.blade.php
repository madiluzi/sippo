@extends('master')
@section('title', 'Sistem Persediaan Produk')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
        <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Aktivitas Stok Pekan Terakhir</h3>
                    <p class="panel-subtitle">Period: {{ \Carbon\Carbon::now()->subDays(7)->format('d-m-Y') }} - {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                        <p>
                                            <span class="number">{{$kopi->jumlah_stok}} tersedia</span>
                                            <span class="title">{{$kopi->nama_produk}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-eye"></i></span>
                                        <p>
                                            <span class="number">{{$kopiLuwak->jumlah_stok}} tersedia</span>
                                            <span class="title">{{$kopiLuwak->nama_produk}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                            <span class="number">{{$sabun->jumlah_stok}} tersedia</span>
                                            <span class="title">{{$sabun->nama_produk}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-download"></i></span>
                                        <p>
                                            <span class="number">{{$coklat->jumlah_stok}} tersedia</span>
                                            <span class="title">{{$coklat->nama_produk}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{--<div id="headline-chart" class="ct-chart"></div>--}}
                            {{--<canvas id="myChart" width="400" height="200"></canvas>--}}
                        </div>

                        <div class="col-md-3">
                            <div class="weekly-summary text-right">
                                <span class="number">{{$totalStok}}</span>
                                <span class="info-label">Total Stok Barang</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">{{$produkHampirHabis}} Produk</span>
                                <span class="info-label">Hampir Habis</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">{{$produkHabis}} Produk</span>
                                <span class="info-label">Habis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OVERVIEW -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Stok Terbaru -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jumlah Stok Terbaru</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Tanggal & Waktu</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Stok</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($masukTerbaru as $item)
                                    <tr>
                                        <td>{{$item->updated_at}}</td>
                                        <td>{{$item->nama_produk}}</td>
                                        <td>{{$item->jumlah_stok}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 text-right"><a href="/transaksi-masuk" class="btn btn-primary">Lihat Semua Transaksi Masuk</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Stok Terbaru -->
                </div>
                <div class="col-md-6">
                    <!-- Stok Hampir Habis -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Stok Hampir Habis</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Stok</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hampirHabis as $item)
                                    <tr>
                                        <td>{{$item->nama_produk}}</td>
                                        <td>{{$item->jumlah_stok}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-6 text-right"><a href="/laporan-stok" class="btn btn-primary">Lihat Semua Transaksi Keluar</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Stok Hampir Habis -->
                </div>

                {{--<div class="col-md-6">--}}
                    {{--<!-- MULTI CHARTS -->--}}
                    {{--<div class="panel">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<h3 class="panel-title">Projection vs. Realization</h3>--}}
                            {{--<div class="right">--}}
                                {{--<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i>--}}
                                {{--</button>--}}
                                {{--<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div id="visits-trends-chart" class="ct-chart"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- END MULTI CHARTS -->--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
@endsection

