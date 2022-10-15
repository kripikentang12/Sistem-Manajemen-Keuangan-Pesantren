<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CashBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $now = date('Y-m-d');
        $month = date('Y-m');
        $santris    = DB::table('santris')->where('types','=','Santri')->count();
        $users      = DB::table('users')->count();
        $debit_day      = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('debit'));
        $credit_day     = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('credit'));
        $balance_day    = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('debit - credit'));
        $debit_month      = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('debit'));
        $credit_month     = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('credit'));
        $balance_month    = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('debit - credit'));

        $chart1_options = [
            'chart_title' => 'Pemasukan per Tahun',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'group_by_field' => "created_at",
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'debit',
            'chart_color' => '30,144,255',
        ];
        $chart1 = new LaravelChart($chart1_options);

        $chart2_options = [
            'chart_title' => 'Pengeluaran per Bulan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'credit',
            'chart_color' => '255,20,147',
        ];
        $chart2 = new LaravelChart($chart2_options);

        $chart3_options = [
            'chart_title' => 'Saldo Kas per Bulan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'chart_color' => '34,139,34',
        ];
        $chart3 = new LaravelChart($chart3_options);

        return view('home', compact(
            'santris',
            'users',
            'debit_day',
            'credit_day',
            'balance_day',
            'debit_month',
            'credit_month',
            'balance_month',
            'chart1',
            'chart2',
            'chart3',
        ));
    }

    public function month($number){
        $dateObj   = \DateTime::createFromFormat('!m', $number);
        $monthName = $dateObj->format('F'); // March
        return $monthName;
    }
}
