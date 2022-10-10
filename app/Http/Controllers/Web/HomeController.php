<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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

        return view('home', compact(
            'santris',
            'users',
            'debit_day',
            'credit_day',
            'balance_day',
            'debit_month',
            'credit_month',
            'balance_month',
        ));
    }
}
