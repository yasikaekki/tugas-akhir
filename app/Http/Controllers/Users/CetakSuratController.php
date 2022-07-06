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
        $data = count($cetaksurat);
        $cetak = CetakSurat::find($data);
        return view('cetak.print',compact('cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
        // $url = PDF::loadview('cetak.print',compact('cetak', 'data', 'kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
        // $url->setPaper('A4','potrait');
        // return $url->stream($data->buat_surat->no_surat.$data->buat_surat->nomor_surat->jenis_surat.'.pdf');
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
        $cetak->created_at = \Carbon\Carbon::now();
        $cetak->save();

        $rekap = new RekapitulasiSurat();
        $rekap->cetak_surat_id = $cetak->id;
        $rekap->save();

        $surat = new BuatSurat();
        $surat->save();

        $tubuh = new TubuhSurat();
        $tubuh->save();

        $kode=BuatSurat::find($id);
        $kode->created_at = \Carbon\Carbon::now();
        $kode->save();

        $nomor=NomorSurat::find($kode->nomor_surat_id);
        if ($tahun == 1) {
            if ($nomor->tahun_satu == null) {
                # code...
                $nomor->tahun_satu = 1;
            } else {
                # code...
                $nomor->tahun_satu = $nomor->tahun_satu+1;
            }
        }elseif ($tahun == 2) {
            if ($nomor->tahun_dua == null) {
                # code...
                $nomor->tahun_dua = 1;
            } else {
                # code...
                $nomor->tahun_dua = $nomor->tahun_dua+1;
            }
        }elseif ($tahun == 3) {
            if ($nomor->tahun_tiga == null) {
                # code...
                $nomor->tahun_tiga = 1;
            } else {
                # code...
                $nomor->tahun_tiga = $nomor->tahun_tiga+1;
            }
        }elseif ($tahun == 4) {
            if ($nomor->tahun_empat == null) {
                # code...
                $nomor->tahun_empat = 1;
            } else {
                # code...
                $nomor->tahun_empat = $nomor->tahun_empat+1;
            }
        }elseif ($tahun == 5) {
            if ($nomor->tahun_lima == null) {
                # code...
                $nomor->tahun_lima = 1;
            } else {
                # code...
                $nomor->tahun_lima = $nomor->tahun_lima+1;
            }
        }elseif ($tahun == 6) {
            if ($nomor->tahun_enam == null) {
                # code...
                $nomor->tahun_enam = 1;
            } else {
                # code...
                $nomor->tahun_enam = $nomor->tahun_enam+1;
            }
        }elseif ($tahun == 7) {
            if ($nomor->tahun_tujuh == null) {
                # code...
                $nomor->tahun_tujuh = 1;
            } else {
                # code...
                $nomor->tahun_tujuh = $nomor->tahun_tujuh+1;
            }
        }elseif ($tahun == 8) {
            if ($nomor->tahun_delapan == null) {
                # code...
                $nomor->tahun_delapan = 1;
            } else {
                # code...
                $nomor->tahun_delapan = $nomor->tahun_delapan+1;
            }
        }elseif ($tahun == 9) {
            if ($nomor->tahun_sembilan == null) {
                # code...
                $nomor->tahun_sembilan = 1;
            } else {
                # code...
                $nomor->tahun_sembilan = $nomor->tahun_sembilan+1;
            }
        }
        
        $nomor->save();

        $cetakbaru = new CetakSurat();
        $cetakbaru->user_id = Auth::id();
        $cetakbaru->konfigurasi_kop_surat_id = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $cetakbaru->save();

        $laporan = new LaporanSurat();
        $laporan->cetak_surat_id = $cetak->id;
        $laporan->save();

        $listbulan = Bulan::find($bulan);
        if ($tahun == 1) {
            $listbulan->tahun_satu = $rekap->id;
        }elseif ($tahun == 2) {
            $listbulan->tahun_dua = $rekap->id;
        }elseif ($tahun == 3) {
            $listbulan->tahun_tiga = $rekap->id;
        }elseif ($tahun == 4) {
            $listbulan->tahun_empat = $rekap->id;
        }elseif ($tahun == 5) {
            $listbulan->tahun_lima = $rekap->id;
        }elseif ($tahun == 6) {
            $listbulan->tahun_enam = $rekap->id;
        }elseif ($tahun == 7) {
            $listbulan->tahun_tujuh = $rekap->id;
        }elseif ($tahun == 8) {
            $listbulan->tahun_delapan = $rekap->id;
        }elseif ($tahun == 9) {
            $listbulan->tahun_sembilan = $rekap->id;
        }
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
