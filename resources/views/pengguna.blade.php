@extends('master')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Transaksi Barang Keluar</h3>
            <div class="row">
                <div class="col-md-3">
                    <form class="navbar-form navbar-left hidden-xs">
                        <div class="input-group">
                            <input type="text" value="" class="form-control" placeholder="Temukan...">
                            <span class="input-group-btn"><button type="button"
                                                                  class="btn btn-primary">Cari</button></span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-md-offset-2">
                    <span>Tampilkan</span>
                    <select class="form-control input-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                    <span>data</span>
                </div>

            </div>
            <div class="panel">
                <div class="panel-heading">
                    <a href="" class="btn btn-primary">Tambah</a>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>13/01/2017</td>
                            <td>Kopi Luwak 500 g</td>
                            <td>5</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-warning">Ubah</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection