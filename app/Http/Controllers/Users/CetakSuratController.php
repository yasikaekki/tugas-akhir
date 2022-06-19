<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\Model\SuratPembuka;
use App\Model\SuratPenutup;
use App\Model\TubuhSurat;
use App\Model\NomorSurat;
use App\Model\CetakSurat;
use App\Bulan;
use App\Tahun;
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
        $kode = count($cetaksurat);

        return view('surat.cetaksurat.index', compact('judul', 'cetak', 'kode'));
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
        $array= array(2022=>1,2,3,4,5,6,7,8,9);
        $tahun = $array[date('Y')];
        $bulan = date('n');
        $nomor = new LaporanSurat();
        $nomor->user_id = Auth::id();
        $nomor->created_at = \Carbon\Carbon::now();
        $nomor->save();

        $rekap = LaporanSurat::find($id);
        $listbulan = Bulan::find($bulan);
        $listbulan->laporan_surat_id = $rekap->id;
        $listbulan->created_at = \Carbon\Carbon::now();
        $listbulan->save();

        $listbulan = Tahun::find($tahun);
        $listbulan->laporan_surat_id = $rekap->id;
        $listbulan->created_at = \Carbon\Carbon::now();
        $listbulan->save();

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
