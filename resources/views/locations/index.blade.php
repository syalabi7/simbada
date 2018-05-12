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
                    Lokasi / Ruang
                </h1>
            </div>
            <div class="body">
                <div>
                    <button type="button" class="btn bg-green waves-effect"
                            data-toggle="modal"
                            data-target="#myModal">
                        <i class="material-icons">add_circle</i>
                        <span>Tambah Lokasi / Ruang</span>
                    </button>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lokasi / Ruang</th>
                            <th>Data Aset</th>
                            <th>Form Aset</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                        <tr>
                            <td>{{ $location->id_lokasi_pusat }}</td>
                            <td>{{ $location->nama_lokasi }}</td>
                            <td><a href="">Lihat Aset</a></td>
                            <td><a href="">+ Tambah Aset</a></td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                        data-locid="{{ $location->id_lokasi_pusat }}"
                                        data-locname="{{ $location->nama_lokasi }}"
                                        data-location_id="{{ $location->id }}"
                                        data-toggle="modal"
                                        data-target="#editLocation" data-loc-id="{{ $location->id }}">
                                    Edit
                                </button>
                                &nbsp;&nbsp;

                                <a href="{{ url('locations/destroy').'/'.$location->id }}" class="btn btn-danger">
                                    Hapus
                                </a>
                            </td>
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

<!-- Modal Insert -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Tambah Lokasi / Ruang</h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form action="{{ route('locations.store') }}" method="POST">
                        <label>ID Lokasi / Ruang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_lokasi" placeholder="Masukkan ID Lokasi / Ruang">
                            </div>
                        </div>
                        <label>Nama Lokasi / Ruang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_lokasi" placeholder="Masukkan Nama Lokasi / Ruang">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">+ Tambah</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Modal Insert-->

<!-- Modal Update -->
<div class="modal fade" id="editLocation" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Edit Lokasi / Ruang</h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form action="{{ route('locations.update', 'test') }}" method="POST">
                        {{ method_field('patch')}}
                        <input type="hidden" name="location_id" value="" id="location_id">
                        <label>ID Lokasi / Ruang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_lokasi" id="id_lokasi">
                            </div>
                        </div>
                        <label>Nama Lokasi / Ruang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi">
                            </div>
                        </div class="modal-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Modal Update-->
@endsection

@section('add_js')

@endsection