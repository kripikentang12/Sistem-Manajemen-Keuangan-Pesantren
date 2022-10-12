<?php

namespace App\Http\Controllers\Web;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\CashBook;
use App\Models\Cost;
use App\Models\OrderRegcost;
use App\Models\OrderSyahriah;
use App\Models\RegistrationCost;
use App\Models\Santri;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RegistrationCostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data       = RegistrationCost::with('santris','orders')->latest()->paginate(10);
        $keyword    = $request->keyword;
        if ($keyword)
            $data   = RegistrationCost::whereHas('santris', function ($query) use ($keyword) {
                        return $query->where('name', 'LIKE', "%$keyword%")
                                ->orWhere('address', 'LIKE', "%$keyword%");
                    })
                    ->latest()
                    ->paginate(10);

        return view('registration.index', compact('data'));
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Santri::where('types','=','Santri')->get();
        $cost = Cost::first();

        return view('registration.create', compact('data', 'cost'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'santri_id' => 'required|unique:registration_costs,santri_id',
        ]);

        $regcost = RegistrationCost::create([
            'santri_id' => $request->santri_id,
            'construction' => $request->construction,
            'facilities' => $request->facilities,
            'wardrobe' => $request->wardrobe,
            'status' => 'Menunggu Pembayaran'
        ]);
        $total = $request->construction + $request->facilities + $request->wardrobe;

        $order = OrderRegcost::create([
            'number' => Str::random(8),
            'total_price' => $total,
            'payment_status' => 1,
            'registration_cost_id' => $regcost->id
        ]);

        $santri = RegistrationCost::with('santris')
                ->where('santri_id', $request->santri_id)
                ->first();

        LogActivity::addToLog('Bayar Pendaftaran ' . $santri->santris->name);
        return redirect()->route('registration.index')
            ->with('alert', 'Pembayaran Pendaftaran Santri berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {
            $regcost = RegistrationCost::findOrFail($id);
            $regcost->delete();

            LogActivity::addToLog('Hapus Data Pembayaran Pendaftaran');
            return redirect()->route('registration.index')
                ->with('alert','Data Pembayaran berhasil dihapus.');
        }
        abort(403);
    }

    public function print($id)
    {
      $data = RegistrationCost::with('santris')->findOrFail($id);
      $total = $data->construction + $data->facilities + $data->wardrobe;
      $pdf = PDF::loadView('registration.print', compact('data', 'total'))->setPaper('a4', 'portrait');

      return $pdf->stream('bukti_pembayaran_pendaftaran.pdf');
    }

}
