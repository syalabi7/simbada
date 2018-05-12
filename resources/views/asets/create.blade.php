@extends('layouts.newmaster')

@section('title', 'Master Aset')

@section('navbar')
@parent

@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button type="button" class="btn btn-primary right" data-toggle="modal" data-target="#myModal">Import .CSV</button>
                <h1>
                    Tambah Aset
                </h1>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="{{ route('asets.store') }}">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Lokasi/Ruang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="location">
                                        <option value="">-- Please select --</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->nama_lokasi }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Kategori Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="category">
                                        <option value="">-- Please select --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Nama Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama barang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Merk/Tipe</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="merk" class="form-control" placeholder="Masukkan merk / tipe barang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Tahun pengadaan</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="year">
                                        <option value="">-- Please select --</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}"> {{ $year }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Spesifikasi / Keterangan</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="ket" class="form-control no-resize" placeholder="Masukkan keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Nilai Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="nilai" class="form-control" placeholder="Rp. ________">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Sumber Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="sumber">
                                        <option value="">-- Please select --</option>
                                        @foreach($sumbers as $sumber)
                                        <option value="{{ $sumber->id }}">{{ $sumber->nama_sumber }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label>Kondisi Barang</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="condition">
                                        <option value="">-- Please select --</option>
                                        @foreach($conditions as $condition)
                                        <option value="{{ $condition->id }}">{{ $condition->nama_kondisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->

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
                    <form action="http://localhost/wati/simbada/static/importfromexcel.php" method="POST" enctype="multipart/form-data">
                        <label>Pilih FIle .CSV</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" class="form-control" name="file" placeholder="Masukkan ID Lokasi / Ruang">
                            </div>
                        </div>
                        <button type="submit" name="import" class="btn btn-success m-t-15 waves-effect">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Modal Insert-->

@endsection

@section('add_js')

@endsection