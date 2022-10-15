@extends('layouts.home')
@section('title_page','Dashboard')
@section('content')

@if(Auth::user()->role != 'Santri')
    @if(Auth::user()->role != 'Pengurus')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Santri</h4>
                </div>
                <div class="card-body">
                    {{ $santris }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pengguna</h4>
                </div>
                <div class="card-body">
                    {{ $users }}
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pemasukan Hari Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($debit_day, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pengeluaran Hari Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($credit_day, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Saldo Kas Hari Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($balance_day, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pemasukan Bulan Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($debit_month, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pengeluaran Bulan Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($credit_month, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Saldo Kas Bulan Ini</h4>
                </div>
                <div class="card-body">
                    <h5>Rp. {{ number_format($balance_month, 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            {!! $chart1->renderHtml() !!}
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            {!! $chart2->renderHtml() !!}
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            {!! $chart3->renderHtml() !!}
        </div>
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
    {!! $chart3->renderChartJsLibrary() !!}
    {!! $chart3->renderJs() !!}
@endsection
