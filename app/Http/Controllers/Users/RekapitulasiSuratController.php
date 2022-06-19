<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Tahun;
use App\Bulan;
use Auth;
use DB;

class RekapitulasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $no = 1;
        $judul = 'Rekapitulasi Surat Keluar';
        $laporan = LaporanSurat::all();
        $uid = Auth::id();
        $array= array(2022=>1,2,3,4,5,6,7,8,9);
        $data = $array[date('Y')];
        $listbulan = Bulan::all();
        $bulan = date('n');
        $tahun = Tahun::all();
        $laporanid = count($laporan);
        $rekapitulasi = $laporan->where('id', $laporanid);
        $kata = $request->fitur_filter;
        $keywoard = Tahun::find($kata);
        if($request->fitur_filter){
            $tahun= Tahun::all()->where('rekapitulasi_surat_id', $request->fitur_filter);
        } 
        $rekap1 = LaporanSurat::whereYear('created_at', '=', 2022)->whereMonth('created_at', '=', 06)->get();
        return view('rekapitulasi.index', compact('no' ,'judul','listbulan', 'keywoard','data','tahun','rekapitulasi'));
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
