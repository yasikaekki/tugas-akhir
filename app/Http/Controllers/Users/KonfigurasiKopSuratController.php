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
        $kopid = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop = KonfigurasiKopSurat::find($kopid);

        return view('konfigurasi.index', compact('judul', 'kop'));
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
        $kopsurat= KonfigurasiKopSurat::find($id);

        $file = $request->file('lokasi_foto');
        $nama_file = time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = 'assets/logo kop/';
        $file->move($tujuan_upload, $nama_file);
        $kopsurat->lokasi_foto = $nama_file;

        $kopsurat->nama_upt=$request->nama_upt;
        $kopsurat->nama_mentri=$request->nama_mentri;

        if ($kopsurat->nama_upt == null || $kopsurat->nama_mentri == null) {
            $kopsurat->created_at=\Carbon\Carbon::now();
            $kopsurat->save();
            return redirect()->route('konfigurasi.index')->with('sukses', 'Kop surat berhasil disimpan');      
        }else {   
            $kopsurat->updated_at=\Carbon\Carbon::now();
            $kopsurat->save();
            return redirect()->route('konfigurasi.index')->with('sukses', 'Kop surat berhasil diperbarui');
        }
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
