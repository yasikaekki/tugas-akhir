<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NomorSurat;
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
        $judul = 'Rekapitulasi Bulan';
        $listbulan = Bulan::all();
        $tahun = Tahun::all();
        $kata = $request->fitur_filter;
        $array = array(2022=>1,2,3,4,5,6,7,8,9);
        $year = $array[date('Y')];
        $keywoard = Tahun::find($year);
        if($request->fitur_filter){
            $keywoard = Tahun::find($kata);
            $tahun = Tahun::all()->where('id', $request->fitur_filter);
            if($keywoard->rekapitulasi_surat_id == null) {
                $tahun =Tahun::all();
            }else {
                $tahun =Tahun::all();
            }
        }
        return view('rekapitulasi.bulan.index', compact('no', 'year','judul','listbulan', 'keywoard','tahun'));
    }

    public function jenis_surat(Request $request) 
    {
        $no = 1;
        $judul = 'Rekapitulasi Jenis Surat';
        $nomor = NomorSurat::all();
        $tahun = Tahun::all();
        $kata = $request->fitur_filter;
        $array = array(2022=>1,2,3,4,5,6,7,8,9);
        $year = $array[date('Y')];
        $keywoard = Tahun::find($year);
        if($request->fitur_filter){
            $keywoard = Tahun::find($kata);
            $tahun = Tahun::all()->where('id', $request->fitur_filter);
            if($keywoard->rekapitulasi_surat_id == null) {
                $tahun =Tahun::all();
            }else {
                $tahun =Tahun::all();
            }
        } 
        return view('rekapitulasi.jenis_surat.index', compact('no' ,'judul','nomor','keywoard','tahun'));
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
