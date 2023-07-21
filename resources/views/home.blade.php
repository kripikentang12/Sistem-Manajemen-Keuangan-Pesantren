@extends('layouts.home')
@section('title_page','Statistic Dashboard')
@section('content')

@if(Auth::user()->role != 'Santri')
    @if(Auth::user()->role != 'Pengurus')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
{{--        <div class="card card-statistic-1">--}}
{{--            <div class="card-icon bg-danger">--}}
{{--                <i class="fas fa-users"></i>--}}
{{--            </div>--}}
{{--            <div class="card-wrap">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Santri</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    {{ $santris }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>{{$santris}}</h4>
                <div class="card-description">Santri</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
{{--        <div class="card card-statistic-1">--}}
{{--            <div class="card-icon bg-info">--}}
{{--                <i class="fas fa-user-cog"></i>--}}
{{--            </div>--}}
{{--            <div class="card-wrap">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Pengguna</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    {{ $users }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="card card-hero">
            <div class="card-header" style="background-image: linear-gradient(to bottom, #F07470, #F1959B);">
                <div class="card-icon" style="color: #F6BDC0">
                    <i class="fas fa-user"></i>
                </div>
                <h4>{{$users}}</h4>
                <div class="card-description">Pengguna</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-hero">
            <div class="card-header" style="background-image: linear-gradient(to bottom, #F07470, #F1959B);">
                <div class="card-icon" style="color: #F6BDC0">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h4>{{$donaturs}}</h4>
                <div class="card-description">Donatur</div>
            </div>
        </div>
    </div>
</div>
    @endif
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemasukan</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($credit, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengeluaran</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($debit, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Saldo Akhir</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($balance, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="row">--}}
{{--    <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--        <div class="card card-statistic-1">--}}
{{--            <div class="card-icon bg-warning">--}}
{{--                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>--}}
{{--            </div>--}}
{{--            <div class="card-wrap">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Pemasukan Bulan Ini</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    Rp. {{ number_format($debit_month, 2, ',', '.') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--        <div class="card card-statistic-1">--}}
{{--            <div class="card-icon bg-warning">--}}
{{--                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>--}}
{{--            </div>--}}
{{--            <div class="card-wrap">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Pengeluaran Bulan Ini</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    Rp. {{ number_format($credit_month, 2, ',', '.') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--        <div class="card card-statistic-1">--}}
{{--            <div class="card-icon bg-warning">--}}
{{--                <i class="fas fa-file-invoice-dollar" style="font-size: 32px"></i>--}}
{{--            </div>--}}
{{--            <div class="card-wrap">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Saldo Kas Bulan Ini</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    Rp. {{ number_format($balance_month, 2, ',', '.') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            {!! $chart1->renderHtml() !!}
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            {!! $chart2->renderHtml() !!}
        </div>
    </div>
    <div class="row">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable({!! $result !!});

                var options = {
                    title: 'SPP dan Donatur',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
{{--        <div class="col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--            {!! $chart3->renderHtml() !!}--}}
{{--        </div>--}}
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="piechart_3d" style="height: 500px"></div>
        </div>
{{--        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>--}}
    </div>
@else
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-whitesmoke">
                    <img alt="image" src="{{ asset('assets/img/aljazary.png') }}" width="100%" class="rounded-circle mr-1">
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>SELAMAT DATANG</h4>
                    </div>
                    <div class="card-body">
                        {{ Auth::user()->santris->name }}
                    </div>
                </div>
            </div>
        </div>
@endif

@endsection

@section('script')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!}
{{--    {!! $chart3->renderChartJsLibrary() !!}--}}
{{--    {!! $chart3->renderJs() !!}--}}
@endsection
