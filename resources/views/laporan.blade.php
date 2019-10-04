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
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
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
            var oTable = $('#tabel-penjualan').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0 , "desc" ]],
                ajax: {
                    url: '{{ url("data-laporan-penjualan") }}'
                },
                columns: [
                    {data: 'pemesanan.tgl_pesan', name: 'pemesanan.tgl_pesan'},
                    {data: 'produk.nama_produk', name: 'produk.nama_produk'},
                    {data: 'produk.harga_satuan', name: 'produk.harga_satuan'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'harga', name: 'harga', orderable: false, searchable: false},
//                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            });
        });
    </script>
@endsection