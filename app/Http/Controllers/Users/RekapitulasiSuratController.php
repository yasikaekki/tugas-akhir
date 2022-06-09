<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
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
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $laporan = LaporanSurat::find($laporanid);
        $uid = Auth::id();
        $arrbulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $bulan = $arrbulan[date('n')];
        $tahun = date('Y');
        $bulanini = DB::table('laporan_surats')->where('user_id',$uid)->orWhere('created_at', $bulan)->get();
        $jumlahbulan = count($bulanini);
        $month = $request->get('month');
        $year = $request->get('year');
        $rekap = LaporanSurat::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();

        return view('rekapitulasi.index', compact('no' ,'judul', 'laporan', 'jumlahbulan', 'arrbulan', 'rekap'));
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
