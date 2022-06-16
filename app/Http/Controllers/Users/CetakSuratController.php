<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\RekapitulasiSurat;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Model\SuratPembuka;
use App\Model\SuratPenutup;
use App\Model\TubuhSurat;
use App\Model\NomorSurat;
use App\Model\CetakSurat;
use App\User;
use Auth;
use DB;

class CetakSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Cetak Surat';
        $cetakid = CetakSurat::get()->last()->id;
        $cetak = CetakSurat::find($cetakid);
        $cetaksurat = CetakSurat::all();

        return view('surat.cetaksurat.index', compact('judul', 'cetak'));
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
        $nomor = new LaporanSurat();
        $nomor->user_id = Auth::id();
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->save();

        $rekapitulasi = new RekapitulasiSurat();
        $rekapitulasi->user_id = Auth::id();
        $rekapitulasi->created_at = \Carbon\Carbon::now();
        $rekapitulasi->save();

        $pembuka = new SuratPembuka();
        $pembuka->user_id = Auth::id();
        $pembuka->created_at = \Carbon\Carbon::now();
        $pembuka->save();

        $tubuh = new TubuhSurat();
        $tubuh->user_id = Auth::id();
        $tubuh->created_at = \Carbon\Carbon::now();
        $tubuh->save();

        $penutup = new SuratPenutup();
        $penutup->user_id = Auth::id();
        $penutup->created_at = \Carbon\Carbon::now();
        $penutup->save();

        $penutup = new CetakSurat();
        $penutup->user_id = Auth::id();
        $penutup->created_at = \Carbon\Carbon::now();
        $penutup->save();

        return redirect()->route('cetak.index')->with('sukses', 'Surat berhasil dicetak');
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
        $nomor = NomorSurat::find($id);
        $nomor->user_id = $request->user_id;
        $nomor->created_at = Carbon\Carbon::now();
        $nomor->save();

        $pembuka = SuratPembuka::find($id);
        $pembuka->user_id = $request->user_id;
        $pembuka->created_at = Carbon\Carbon::now();
        $pembuka->save();

        $tubuh = TubuhSurat::find($id);
        $tubuh->user_id = $request->user_id;
        $tubuh->created_at = Carbon\Carbon::now();
        $tubuh->save();

        $penutup = SuratPenutup::find($id);
        $penutup->user_id = $request->user_id;
        $penutup->created_at = Carbon\Carbon::now();
        $penutup->save();

        return redirect()->route('cetak.index')->with('sukses', 'Surat berhasil diperbarui');
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
