<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
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
        // if ($request) {
        //     $fitur_cari = DB::table('users')->where('name','like','%'.$request->hasil_cari.'%')->where('role', 'user')->orderBy('created_at','desc')->where('deleted_at', null)
        //     ->paginate(10);
        //     $fitur_cari->appends($request->all());
        // }
        
        $judul = 'Laporan Surat Keluar';
        $uid = Auth::id();
        $no = 1;
        $laporan = laporanSurat::all();
        $jenisid = LaporanSurat::all()->where('user_id', $uid);
        $surat = count($jenisid);
        $isiid = LaporanSurat::all()->last()->id;
        $isi= LaporanSurat::find($isiid);
        $tahun = date('Y');
        $default = LaporanSurat::whereYear('created_at', '=', $tahun)->get();
        return view('laporan.index', compact('judul', 'surat', 'no', 'isi', 'laporan'));
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
