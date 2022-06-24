<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\RekapitulasiSurat;
use Illuminate\Http\Request;
use App\Model\KonfigurasiKopSurat;
use App\Model\BuatSurat;
use App\Model\TubuhSurat;
use App\NomorSurat;
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
        $kop1 = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,";
        $kop2 = "RISET, DAN TEKNOLOGI";
        $kop3 = "POLITEKNIK NEGERI BANYUWANGI";
        $upt = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop4 = KonfigurasiKopSurat::find($upt);
        $kop5 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop6 = "E-mail: poliwangi@poliwangi.ac.id : Laman : http://www.poliwangi.ac.id";

        $judul = 'Cetak Surat';
        $cetaksurat = CetakSurat::all();
        $surat = BuatSurat::all();
        $data = count($cetaksurat);
        $cetak = CetakSurat::find($data);

        return view('cetak.index', compact('judul', 'cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
    }

    public function invoice(){
        $kop1 = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,";
        $kop2 = "RISET, DAN TEKNOLOGI";
        $kop3 = "POLITEKNIK NEGERI BANYUWANGI";
        $upt = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop4 = KonfigurasiKopSurat::find($upt);
        $kop5 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop6 = "E-mail: poliwangi@poliwangi.ac.id : Laman : http://www.poliwangi.ac.id";

        $judul = 'Cetak Surat';
        $cetaksurat = CetakSurat::all();
        $surat = BuatSurat::all();
        $data = count($cetaksurat);
        $cetak = CetakSurat::find($data);

        $url = PDF::loadview('cetak.index', compact('cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
        
        return $url->download('cetak-surat-pdf');
        // return $url->stream();
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

        $kop=KonfigurasiKopSurat::find($id);

        $laporan = BuatSurat::find($id);
        $rekap = new RekapitulasiSurat();
        $rekap->buat_surat_id = $laporan->id;
        $rekap->save();

        $listbulan = Bulan::find($bulan);
        $listbulan->rekapitulasi_surat_id = $rekap->id;
        $listbulan->save();

        $listbulan = Tahun::find($tahun);
        $listbulan->rekapitulasi_surat_id = $rekap->id;
        $listbulan->save();

        $surat = new BuatSurat();
        $surat->user_id = Auth::id();
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();

        $tubuh = new TubuhSurat();
        $tubuh->buat_surat_id = $surat->id;
        $tubuh->save();

        $cetak=CetakSurat::find($id);
        $cetak->created_at = \Carbon\Carbon::now();
        $cetak->save();

        $cetakbaru = new CetakSurat();
        $cetakbaru->user_id = Auth::id();
        $cetakbaru->konfigurasi_kop_surat_id = $kop->id;
        $cetakbaru->buat_surat_id = $surat->id;
        $cetakbaru->created_at = \Carbon\Carbon::now();
        $cetakbaru->save();

        $kode = BuatSurat::find($id);
        $nomor=NomorSurat::find($kode->nomor_surat_id);
        $nomor->cetak_surat_id = $cetak->id;
        $nomor->save();

        return redirect()->route('surat-cetak.index')->with('sukses', 'Surat berhasil dicetak');
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
