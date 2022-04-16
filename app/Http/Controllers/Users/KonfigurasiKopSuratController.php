<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KonfigurasiKopSurat;
use Auth;
use Hash;
use DB;

class KonfigurasiKopSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Konfigurasi Kop Surat';
        $authuser = Auth::user();
        $kopid = KonfigurasiKopSurat::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop = KonfigurasiKopSurat::find($kopid);

        return view('konfigurasi.index', compact('judul', 'authuser','kop'));
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
        $this->validate($request, [
            //'ubah_foto'=> 'required',
            'nama_upt'=> 'required',
            'nama_mentri'=> 'required',
        ]);

        $kopsurat=new KonfigurasiKopSurat();
        $kopsurat->user_id = Auth::user()->id;
        // $kopsurat->ubah_fotot=$request->ubah_foto;
        $kopsurat->nama_upt=$request->nama_upt;
        $kopsurat->nama_mentri=$request->nama_mentri;
        $kopsurat->created_at=\Carbon\Carbon::now();
        $kopsurat->save();

        return redirect()->route('konfigurasi.index')->with('sukses', 'kop surat berhasil diperbarui');
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
