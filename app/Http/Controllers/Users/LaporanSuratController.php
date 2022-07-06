<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Model\BuatSurat;
use App\Model\LaporanSurat;
use App\User;
use App\Bulan;
use App\Tahun;
use Auth;
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
        $laporan = LaporanSurat::paginate(6);
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);
        $katatahun = $request->filter_tahun;
        $katabulan = $request->filter_bulan;
        $bulan = Bulan::all();
        $tahun = Tahun::all();
        // if ($request->fitur_cari) {
        //     $laporan = LaporanSurat::query();
        //     // $laporan = DB::table('laporan_surats');
        //     $laporan->cetak_surat->buat_surat->nomor_surat->where('jenis_surat', 'like', '%'.$request->fitur_cari.'%');
        //     // ->orWhere('perihal','like','%'.$request->fitur_cari.'%')
        //     // ->orWhere('agenda','like','%'.$request->fitur_cari.'%')
        //     // ->orderBy('created_at','desc')
        //     // ->paginate(6);
        // }

        if($request->filter_sort == "asc"){
            $laporan = LaporanSurat::orderBy('created_at', 'asc')->paginate(6);
        }elseif ($request->filter_sort == "desc") {
            $laporan = LaporanSurat::orderBy('created_at', 'desc')->paginate(6);
        }elseif ($request->filter_bulan) {
            $laporan= LaporanSurat::whereMonth('created_at', $request->filter_bulan)->paginate(6);
        }elseif ($request->filter_tahun) {
            $laporan = LaporanSurat::whereYear('created_at', $request->filter_tahun)->paginate(6);
        }

        return view('laporan.index', compact('judul','tahun','bulan' ,'surat', 'no', 'data', 'laporan'));
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
