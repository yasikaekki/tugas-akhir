<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Model\NomorSurat;
use App\User;
use DB;

class LaporanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $judul = 'Laporan Surat Keluar';
        $no = 1;
        $user = User::all();
        $laporan = LaporanSurat::all();
        $nosurat = NomorSurat::all();
        $noid = DB::table('nomor_surats')->select('id')->value('id');
        $jenis = LaporanSurat::all()->where('id_no_surat', $noid);
        $jenissurat = LaporanSurat::find($jenis);
        $month = $request->get('month');
        $year = $request->get('year');
        $inboxs = LaporanSurat::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();

        return view('laporan.index', compact('judul', 'nosurat','no', 'jenissurat','laporan', 'user'));
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
