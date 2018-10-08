@extends('master')
@section('title', 'Laporan Stok|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Laporan Stok</h3>
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-hover" id="tabel-stok">
                        <thead>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <th>Nama Produk</th>
                            <th>Nama Kategori</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        {{--<tbody>--}}
                        {{--@foreach($pemesanan as $value)--}}
                        {{--<tr>--}}
                        {{--<td>{{ (($stok->currentPage() - 1 ) * $stok->perPage() ) + $loop->iteration }}</td>--}}
                        {{--<td>{{$value->pemesanan->tgl_pesan}}</td>--}}
                        {{--<td>{{$value->produk->nama_produk}}</td>--}}
                        {{--<td>{{$value->produk->harga_satuan}}</td>--}}
                        {{--<td>{{$value->jumlah}}</td>--}}
                        {{--<td>{{$value->harga}}</td>--}}
                        {{--<td>--}}
                        {{--<button type="button" class="btn btn-xs btn-warning">Ubah</button>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    </table>
                    {{--{!! $stok->render() !!}--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var oTable = $('#tabel-stok').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 3 , "asc"]],
                ajax: {
                    url: '{{ url("data-laporan-stok") }}'
                },columns: [
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'nama_produk', name: 'nama_produk'},
                    {data: 'kategori.nama_kategori', name: 'kategori.nama_kategori'},
                    {data: 'jumlah_stok', name: 'jumlah_stok'},
                    {data: 'status', name: 'status'},
                ],
            });
        });
    </script>
@endsection