@extends('layouts.newmaster')

@section('title', 'Selamat Datang di Aplikasi SIMBADA SMPN 1 Surabaya')

@section('navbar')
@parent

@endsection

@section('content')
<!-- CPU Usage -->
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <div class="card">
                            <div class="body table-responsive">
                                <table class="table table-hover table-bordered" style="font-size: 20px">
                                    <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terdaftar</td>
                                        <td>{{ $registeredAt }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kunjungan Terakhir</td>
                                        <td>{{ $lastLogin }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <img src="template/images/logo.jpg" class="img-responsive" alt="Logo" width="200" height="280">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# CPU Usage -->

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h1>Statistik Data Per Kategori</h1>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div id="global-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="highchart/code/highcharts.js"></script>
<script src="highchart/code/modules/exporting.js"></script>
<script type="text/javascript">
    Highcharts.chart('global-chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistik Data Per Kategori'
        },
        subtitle: {
            text: 'SIMBADA SMPN 1 Surabaya'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Barang'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Total Barang: <b>{point.y} barang</b>'
        },
        series: [{
            name: 'Kategori',
            data: [
                @foreach($datacharts as $data)
                    ['{{ $data->nama_kategori }}', {{ $data->jumlah }}],
                @endforeach

            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>
@endsection

@section('add_js')

@endsection