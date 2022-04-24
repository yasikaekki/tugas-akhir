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
        $id = DB::table('surat_pembukas')->select('id')->value('id');
        $pembuka = SuratPembuka::find($id);
        $this->validate($request, [
            'lampiran'=> 'required',
            'perihal'=> 'required',
            'kepada'=> 'required',
            'isi_surat_pembuka'=> 'required',
        ]);

        $suratpembuka=new SuratPembuka();
        $suratpembuka->user_id = Auth::user()->id;
        $suratpembuka->lampiran=$request->lampiran;
        $suratpembuka->perihal=$request->perihal;
        $suratpembuka->kepada=$request->kepada;
        $suratpembuka->isi_surat_pembuka=$request->isi_surat_pembuka;
        $suratpembuka->created_at=\Carbon\Carbon::now();
        $suratpembuka->save();

        // $tubuhsurat=new TubuhSurat();
        // $tubuhsurat->user_id = Auth::user()->id;
        // $tubuhsurat->created_at=\Carbon\Carbon::now();
        // $tubuhsurat->save();

        return redirect()->route('pembuka.edit',$pembuka->id)->with('sukses', 'Surat Pembuka berhasil disimpan');
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
        $judul = 'Surat Pembuka';
        $authuser = Auth::user();
        $noid = DB::table('nomor_surats')->select('id')->value('id');
        $nomor = NomorSurat::find($noid);
        $pembuka = SuratPembuka::find($id);
        $suratpembuka = SuratPembuka::latest()->first();

        return view('surat.suratpembuka.edit', compact('judul','pembuka', 'suratpembuka','nomor'));
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
            'lampiran'=> 'required',
            'perihal'=> 'required',
            'kepada'=> 'required',
            'isi_surat_pembuka'=> 'required',
        ]);

        $suratpembuka=SuratPembuka::find($id);
        $suratpembuka->lampiran=$request->lampiran;
        $suratpembuka->perihal=$request->perihal;
        $suratpembuka->kepada=$request->kepada;
        $suratpembuka->isi_surat_pembuka=$request->isi_surat_pembuka;
        $suratpembuka->created_at=\Carbon\Carbon::now();
        $suratpembuka->updated_at=\Carbon\Carbon::now();
        $suratpembuka->save();

        if ($suratpembuka->lampiran == null || $suratpembuka->perihal == null || $suratpembuka->kepada == null || $suratpembuka->isi_surat_pembuka == null) {
            return redirect()->route('pembuka.edit',$id)->with('sukses', 'Surat pembuka berhasil disimpan');
        } else {
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
