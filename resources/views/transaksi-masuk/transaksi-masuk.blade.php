@extends('master')
@section('title', 'Data Transaksi Masuk|Sistem Persediaan Produk')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Data Transaksi Produk Masuk</h3>
            <div class="panel">
                {{--<div class="panel-heading">--}}
                {{--<a href="/transaksi-masuk/tambah" class="btn btn-primary">Tambah</a>--}}
                {{--</div>--}}
                <div class="panel-body">
                    <table class="table" id="tabel-stok">
                        <thead>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Stok</th>
{{--                            @if(Auth::user()->admin==0)--}}
                                <th></th>
                            {{--@endif--}}
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
            var oTable = $('#tabel-stok').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, "desc"]],
                ajax: {
                    url: '{{ url("data-stok") }}'
                },
                columns: [
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'nama_produk', name: 'nama_produk'},
                    {data: 'harga_satuan', name: 'harga_satuan'},
                    {data: 'jumlah_stok', name: 'jumlah_stok'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
//                    {
//                        name: '',
//                        data: null,
//                        sortable: false,
//                        searchable: false,
//                        render: function (data) {
//                            var actions = '';
//                            actions += '<a href="/transaksi-masuk/tambah/:id"><span class="label label-primary">TAMBAH</span></a>';
//                            actions += '<a href="/transaksi-masuk/edit/:id"><span class="label label-warning">EDIT</span></a>';
//                            return actions.replace(/:id/g, data.id_produk);
//                        }
//                    }
                ],
            });
            console.log(oTable);
        });
    </script>
@endsection