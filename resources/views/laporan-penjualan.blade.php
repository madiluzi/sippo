@extends('master')
@section('title', 'Laporan|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Laporan Penjualan</h3>
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-hover" id="tabel-penjualan">
                        <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var oTable = $('#tabel-penjualan').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0 ]],
                ajax: {
                    url: '{{ url("data-laporan-penjualan") }}'
                },
                columns: [
                    {data: 'pemesanan.tgl_pesan', name: 'pemesanan.tgl_pesan'},
                    {data: 'produk.nama_produk', name: 'produk.nama_produk'},
                    {data: 'produk.harga_satuan', name: 'produk.harga_satuan'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'harga', name: 'harga', orderable: false, searchable: false},
                ],
            });
        });
    </script>
@endsection