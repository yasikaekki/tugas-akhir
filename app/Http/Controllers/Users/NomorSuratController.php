<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Model\NomorSurat;
use App\User;
use Auth;
use DB;

class NomorSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Nomor Surat';
        $authuser = Auth::user();
        $nosurat = NomorSurat::all();
        $laporansurat = DB::table('laporan_surats')->select('id')->value('id');
        $dataterakhir = LaporanSurat::latest()->first();
        $laporan = LaporanSurat::latest()->first();

        return view('surat.nosurat.index', compact('judul', 'nosurat', 'laporan'));
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
            'nomor_surat'=> 'required',
        ]);

        $nosurat=new LaporanSurat();
        $nosurat->user_id = Auth::user()->id;
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();

        return redirect()->route('nomor.index')->with('sukses', 'berhasil disimpan');
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
