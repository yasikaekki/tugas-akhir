<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\RekapitulasiSurat;
use Illuminate\Http\Request;
use App\Model\KonfigurasiKopSurat;
use App\Model\BuatSurat;
use App\Model\LaporanSurat;
use App\Model\TubuhSurat;
use App\NomorSurat;
use App\Model\CetakSurat;
use App\Bulan;
use App\Tahun;
use App\User;
use Auth;
use PDF;
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
        $kop1 = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI";
        $kop2 = "POLITEKNIK NEGERI BANYUWANGI";
        $upt = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop3 = "UPT KEWIRAUSAHAAN DAN INKUBATOR BISNIS TEKNOLOGI";
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

    public function printme(){
        $kop1 = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI";
        $kop2 = "POLITEKNIK NEGERI BANYUWANGI";
        $upt = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop3 = "UPT KEWIRAUSAHAAN DAN INKUBATOR BISNIS TEKNOLOGI";
        $kop4 = KonfigurasiKopSurat::find($upt);
        $kop5 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop6 = "E-mail: poliwangi@poliwangi.ac.id : Laman : http://www.poliwangi.ac.id";

        $judul = 'Cetak Surat';
        $cetaksurat = CetakSurat::all();
        $surat = BuatSurat::all();
        $data = count($cetaksurat);
        $cetak = CetakSurat::find($data);
        return view('cetak.print',compact('cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
        // $url = PDF::loadview('cetak.print',compact('cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
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
        $array= array(2022=>1,2,3,4,5,6,7,8,9);
        $tahun = $array[date('Y')];
        $bulan = date('n');

        $cetak = CetakSurat::find($id);
        $rekap = new RekapitulasiSurat();
        $rekap->cetak_surat_id = $cetak->id;
        $rekap->save();

        $surat = new BuatSurat();
        $surat->created_at = \Carbon\Carbon::now();
        $surat->save();

        $tubuh = new TubuhSurat();
        $tubuh->created_at = \Carbon\Carbon::now();
        $tubuh->save();

        $kode=BuatSurat::find($id);
        $nomor=NomorSurat::find($kode->nomor_surat_id);
        if ($nomor->cetak_surat_id == null) {
            # code...
            $nomor->cetak_surat_id = 1;
        } else {
            # code...
            $nomor->cetak_surat_id = $kode->id+1;
        }
        $nomor->save();

        $cetakbaru = new CetakSurat();
        $cetakbaru->user_id = Auth::id();
        $cetakbaru->konfigurasi_kop_surat_id = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $cetakbaru->created_at = \Carbon\Carbon::now();
        $cetakbaru->save();

        $cetakbaru = new LaporanSurat();
        $cetakbaru->cetak_surat_id = $cetak->id;
        $cetakbaru->created_at = \Carbon\Carbon::now();
        $cetakbaru->save();

        $listbulan = Bulan::find($bulan);
        $listbulan->rekapitulasi_surat_id = $rekap->id;
        $listbulan->save();

        $listtahun = Tahun::find($tahun);
        $listtahun->rekapitulasi_surat_id = $rekap->id;
        $listtahun->save();

        return redirect()->route('home')->with('sukses', 'Surat berhasil dicetak');
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
