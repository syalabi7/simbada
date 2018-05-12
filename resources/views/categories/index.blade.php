@extends('layouts.newmaster')

@section('title', 'Selamat Datang di Aplikasi SIMBADA SMPN 1 Surabaya')

@section('navbar')
@parent

@endsection

@section('content')
<div class="block-header">
    <h2>
        Kategori
    </h2>
</div>

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <button type="button" class="btn bg-green waves-effect m-r-20"
                        data-toggle="modal"
                        data-target="#addCategory">
                    <i class="material-icons">add_circle</i>
                    <span>Tambah Kategori</span>
                </button>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Kategori</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->nama_kategori }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"
                                            data-catname="{{ $category->nama_kategori }}"
                                            data-category_id="{{ $category->id }}"
                                            data-toggle="modal"
                                            data-target="#editCategory">
                                        Edit
                                    </button>
                                    &nbsp;&nbsp;
                                    <a href="{{ url('categories/destroy').'/'.$category->id }}" class="btn btn-danger">
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
<!-- Modal Insert -->
<div class="modal fade" id="addCategory" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        <label>Nama Kategori</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="kategori" placeholder="Masukkan Nama Kategori">
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
<div class="modal fade" id="editCategory" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="body">
                    <form action="{{ route('categories.update', 'test') }}" method="POST">
                        {{ method_field('patch')}}
                        <input type="hidden" name="category_id" value="" id="category_id">
                        <label>Nama Kategori</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
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