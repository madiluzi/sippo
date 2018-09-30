@extends('master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Laporan Penjualan</h3>
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-primary">Tambah</button>
                </div>
                <div class="col-md-2 col-md-offset-4">
                    <span>Tampilkan</span>
                    <select class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span>data</span>
                </div>
                <div class="col-md-3">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Temukan...">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary">Cari</button></span>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th class="col-md-6">Nama Barang</th>
                    <th class="col-md-1">Jumlah Barang</th>
                    <th class="col-md-2">Harga Satuan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>nama_barang</td>
                    <td>jumlah_barang</td>
                    <td>Rp. harga_satuan</td>
                    <td>
                        <button type="button" class="btn btn-xs btn-warning">Ubah</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection