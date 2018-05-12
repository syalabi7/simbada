@extends('layouts.newmaster')

@section('title', 'Selamat Datang di Aplikasi SIMBADA SMPN 1 Surabaya')

@section('navbar')
@parent

@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h1>
                    Master Aset
                </h1>
            </div>
            <div class="body">
                <div>
                    <a href="{{ route('asets.create') }}" type="button" class="btn btn-success">+ Tambah Aset</a>
<!--                    <a href="http://localhost/wati/simbada/static/aset.php" type="button" class="btn btn-success">+ Tambah Aset</a>-->
                    <a href="http://localhost/wati/simbada/static/exporttoexcel.php" type="button" class="btn btn-primary right">Export .CSV</a>
                    <a href="{{ 'asets/deleteall' }}" type="button" class="btn btn-danger right" style="margin-right: 10px" >Delete Data Before Import</a>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>Lokasi/Ruang</th>
                            <th>Kategori Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk/Type</th>
                            <th>Tahun Pengadaan</th>
                            <th>Nilai Barang</th>
                            <th>Sumber Barang</th>
                            <th>Kondisi Barang</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->location->nama_lokasi }}</td>
                            <td>{{ $data->category->nama_kategori }}</td>
                            <td>{{ $data->nama_aset }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->nilai_barang }}</td>
                            <td>{{ $data->sumber_barang->nama_sumber }}</td>
                            <td>{{ $data->kondisi_barang->nama_kondisi }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

@endsection

@section('add_js')

@endsection