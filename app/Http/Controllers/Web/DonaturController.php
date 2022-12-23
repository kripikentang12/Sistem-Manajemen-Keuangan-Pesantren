<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Donatur;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data       = Donatur::latest()->paginate(10);
        $keyword    = $request->keyword;
        if ($keyword)
            $data   = Donatur::where('name', 'LIKE', "%$keyword%")
                ->orWhere('item', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate(10);

        return view('donatur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donatur.create');
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
            'date' => 'required|date',
            'name' => 'required|string',
            'item' => 'required|string',
            'quantity' => 'required|numeric|min:1',
        ]);

//        CashBook::create($request->all());
        $data= new Donatur();

        $data['date'] = $request->date;
        $data['name'] = $request->name;
        $data['item'] = $request->item;
        $data['quantity'] = $request->quantity;
        $data->save();

        LogActivity::addToLog('Tambah Donatur');
        return redirect()->route('donatur.index')
            ->with('alert', 'Donasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('donatur.edit', ['donatur' => Donatur::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donatur = Donatur::findOrFail($id);
        $validatedData = $request->all();
        $donatur->update($validatedData);

        LogActivity::addToLog('Edit Data Donatur');
        return redirect()->route('donatur.index')
            ->with('alert', 'Donatur berhasil diupdate.');
    }

}
