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
                    Statistik Kondisi per Lokasi
                </h1>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lokasi / Ruang</th>
                            <th>Kondisi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i=0; $i < count($location); $i++)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $location[$i] }}</td>
                                <td>
                                    <button id="getchart" type="button" class="btn btn-default waves-effect m-r-20"
                                            data-toggle="modal"
                                            data-target="#defaultModal"
                                            title="Lihat Chart">
                                        <i class="material-icons">pie_chart</i>
                                        Lihat Chart
                                    </button>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="body">
                    <div id="chart-kondisi" style="min-width: 310px; margin: 0 auto">
                        Testing
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<script src="highchart/code/highcharts.js"></script>
<script src="highchart/code/modules/exporting.js"></script>
<script type="text/javascript">
    Highcharts.chart('chart-kondisi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Kondisi Barang'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data:
                [
                    {
                        name: 'Baik',
                        y: 5
                    }, {
                        name: 'Rusak Ringan',
                        y: 4,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Rusak Berat',
                        y: 2
                    },
                ]
        }]
    });
</script>

@endsection

@section('add_js')

@endsection