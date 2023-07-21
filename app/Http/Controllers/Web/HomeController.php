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
        $donaturs      = DB::table('donaturs')->count();
        $debit      = DB::table('cash_books')->sum(DB::raw('debit'));
        $credit     = DB::table('cash_books')->sum(DB::raw('credit'));
        $balance    = DB::table('cash_books')->sum(DB::raw('credit - debit'));
        $debit_day      = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('debit'));
        $credit_day     = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('credit'));
        $balance_day    = DB::table('cash_books')->where('date','=',$now)->sum(DB::raw('debit - credit'));
        $debit_month      = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('debit'));
        $credit_month     = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('credit'));
        $balance_month    = DB::table('cash_books')->where('date','like','%'.$month.'%')->sum(DB::raw('debit - credit'));

//        $chart1_options = [
//            'chart_title' => 'Pemasukan per Bulan',
//            'report_type' => 'group_by_date',
//            'model' => 'App\Models\CashBook',
//            'group_by_field' => "created_at",
//            'group_by_period' => 'month',
//            'chart_type' => 'line',
//            'aggregate_function' => 'sum',
//            'aggregate_field' => 'debit',
//            'chart_color' => '30,144,255',
//        ];
//        $chart1 = new LaravelChart($chart1_options);
//
//        $chart2_options = [
//            'chart_title' => 'Pengeluaran per Bulan',
//            'report_type' => 'group_by_date',
//            'model' => 'App\Models\CashBook',
//            'group_by_field' => 'created_at',
//            'group_by_period' => 'month',
//            'chart_type' => 'line',
//            'aggregate_function' => 'sum',
//            'aggregate_field' => 'credit',
//            'chart_color' => '255,20,147',
//        ];
//        $chart2 = new LaravelChart($chart2_options);

//        $chart3_options = [
//            'chart_title' => 'Saldo Kas per Bulan',
//            'report_type' => 'group_by_date',
//            'model' => 'App\Models\CashBook',
//            'group_by_field' => 'created_at',
//            'group_by_period' => 'month',
//            'chart_type' => 'line',
//            'aggregate_function' => 'sum',
//            'aggregate_field' => 'amount',
//            'chart_color' => '34,139,34',
//        ];
//        $chart3 = new LaravelChart($chart3_options);

        $chart1_options = [
            'chart_title' => 'Grafik Pemasukan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'group_by_field' => "created_at",
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'credit',
            'chart_color' => '30,144,255',
        ];
        $chart1 = new LaravelChart($chart1_options);

        $chart2_options = [
            'chart_title' => 'Grafik Pengeluaran',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'debit',
            'chart_color' => '255,20,147',
        ];
        $chart2 = new LaravelChart($chart2_options);

        $chart3_options = [
            'chart_title' => 'SPP dan Donatur',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\CashBook',
            'conditions'            => [
                ['name' => 'SPP', 'condition' => 'syahriah_id is null', 'color' => 'red', 'fill' => true],
                ['name' => 'Uang', 'condition' => 'note = "uang"', 'color' => 'blue', 'fill' => true],
                ['name' => 'Barang', 'condition' => 'note != "uang" and registration_cost_id is null and syahriah_id is null and image is null', 'color' => 'green', 'fill' => true],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'chart_color' => '34,139,34',
        ];
        $chart3 = new LaravelChart($chart3_options);

        $result[] = ['Category','Number'];
        $spp = CashBook::select(
            DB::raw('SUM(amount) as spp')
        )
            ->where('syahriah_id', '!=' , null)
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();
        $i = 0;
        foreach ($spp as $key => $value) {
            $i += (int)$value->spp;
        }
        $result[] = ["SPP", $i];
        $uang = CashBook::select(
            DB::raw("SUM(amount) as uang"),
        )
            ->where('note', '=', 'uang')
            ->orderBy(DB::raw("MONTH(created_at)"))
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();
        $j=0;
        foreach ($uang as $key => $value) {
            $j+=(int)$value->uang;
        }
        $result[] = ["Uang", $j];
        $barang = CashBook::select(
            DB::raw("SUM(amount) as barang")
        )
            ->where('note', '!=', 'uang')
            ->where('syahriah_id','=', null)
            ->where('registration_cost_id','=', null)
            ->where('image','=', null)
            ->orderBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
            ->groupBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
            ->get();
        $k=0;
        foreach ($barang as $key => $value) {
            $k+=(int)$value->barang;
        }
        $result[] = ["Barang", $k];
//        dd($result);

        return view('home', compact(
            'santris',
            'users',
            'donaturs',
            'debit',
            'credit',
            'balance',
            'debit_day',
            'credit_day',
            'balance_day',
            'debit_month',
            'credit_month',
            'balance_month',
            'chart1',
            'chart2',
            'chart3',
        ), ['result' => json_encode($result)]);
    }

    public function month($number){
        $dateObj   = \DateTime::createFromFormat('!m', $number);
        $monthName = $dateObj->format('F'); // March
        return $monthName;
    }
}
