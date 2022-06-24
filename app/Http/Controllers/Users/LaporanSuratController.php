<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BuatSurat;
use App\User;
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
        // if ($request->fitur_cari) {
        //     $laporan = LaporanSurat::all()->with('user')->where('name','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('gelar','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('jabatan','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('no_surat','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('no_nip','like','%'.$request->fitur_cari.'%')
        //     ->orderBy('created_at','desc')
        //     ->paginate(10);
        // }
        
        $judul = 'Laporan Surat Keluar';
        $uid = Auth::id();
        $no = 1;
        $laporan = BuatSurat::all();
        $surat = count($laporan);
        $data= BuatSurat::find($surat);
        $tahun = date('Y');
        return view('laporan.index', compact('judul', 'surat', 'no', 'data', 'laporan'));
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
