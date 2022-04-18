<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPembuka;
use App\User;
use Auth;
use DB;

class SuratPembukaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Surat Pembuka';
        $authuser = Auth::user();
        // $pembuka = DB::table('surat_pembukas')->select('id')->value('id');
        $pembuka = SuratPembuka::latest()->first();

        return view('surat.suratpembuka.index', compact('judul','pembuka'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'lampiran'=> 'required',
            'perihal'=> 'required',
            'kepada'=> 'required',
            'isi_surat_pembuka'=> 'required',
        ]);

        $suratpembuka=new SuratPembuka();
        $suratpembuka->user_id = Auth::user()->id;
        $suratpembuka->lampiran=$request->lampiran;
        $suratpembuka->perihal=$request->perihal;
        $suratpembuka->kepada=$request->kepada;
        $suratpembuka->isi_surat_pembuka=$request->isi_surat_pembuka;
        $suratpembuka->created_at=\Carbon\Carbon::now();
        $suratpembuka->updated_at=\Carbon\Carbon::now();
        $suratpembuka->save();

        return redirect()->route('pembuka.index')->with('sukses', 'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
