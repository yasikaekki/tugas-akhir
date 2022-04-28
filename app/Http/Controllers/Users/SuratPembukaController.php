<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPembuka;
use App\Model\LaporanSurat;
use App\Model\NomorSurat;
use App\User;
use Auth;
use DB;

class SuratPembukaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Surat Pembuka';
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $pembukaid = SuratPembuka::all()->last()->id;
        $pembuka = SuratPembuka::find($pembukaid);
        $laporan = LaporanSurat::find($laporanid);

        return view('surat.suratpembuka.index', compact('judul', 'pembuka', 'laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('errors.404');
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
        return view('errors.404');
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
        return view('errors.404');
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
        $suratpembuka=SuratPembuka::find($id);
        $suratpembuka->lampiran=$request->lampiran;
        $suratpembuka->perihal=$request->perihal;
        $suratpembuka->kepada=$request->kepada;
        $suratpembuka->isi_surat_pembuka=$request->isi_surat_pembuka;

        if ($suratpembuka->lampiran == null || $suratpembuka->perihal == null || $suratpembuka->kepada == null || $suratpembuka->isi_surat_pembuka == null) {
            
            $suratpembuka->created_at=\Carbon\Carbon::now();
            $suratpembuka->save();
            
            return redirect()->route('pembuka.edit',$id)->with('sukses', 'Surat pembuka berhasil disimpan');
        } else {
            
            $suratpembuka->updated_at=\Carbon\Carbon::now();
            $suratpembuka->save();
            
            return redirect()->route('pembuka.edit',$id)->with('sukses', 'Surat pembuka berhasil diperbarui');
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
