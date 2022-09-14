<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\RekapitulasiSurat;
use Illuminate\Http\Request;
use App\Model\KonfigurasiSurat;
use App\Model\BuatSurat;
use App\Model\LaporanSurat;
use App\Model\TubuhSurat;
use App\NomorSurat;
use App\Bulan;
use App\Tahun;
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
        $kop1 = "POLITEKNIK NEGERI BANYUWANGI";
        $kop2 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop3 = "E-mail: poliwangi@poliwangi.ac.id ; Laman : http://www.poliwangi.ac.id";

        $judul = 'Cetak Surat';
        $surat = BuatSurat::all();
        $data = count($surat);
        $cetak = BuatSurat::find($data);

        return view('cetak.index', compact('judul', 'cetak', 'kop1', 'kop2', 'kop3'));
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

        $surat = new BuatSurat();
        $surat->user_id = Auth::id();
        $surat->konfigurasi_surat_id = DB::table('konfigurasi_surats')->select('id')->value('id');
        $surat->save();

        $laporan = new LaporanSurat();
        $laporan->buat_surat_id = $kode->id;
        $laporan->save();

        $listbulan = Bulan::find($bulan);
        if ($tahun == 1) {
            if ($listbulan->tahun_satu ==null) {
                $listbulan->tahun_satu = 1;
            }else {
                $listbulan->tahun_satu = $listbulan->tahun_satu+1;
            }
        }elseif ($tahun == 2) {
            if ($listbulan->tahun_dua ==null) {
                $listbulan->tahun_dua = 1;
            }else {
                $listbulan->tahun_dua = $listbulan->tahun_dua+1;
            }
        }elseif ($tahun == 3) {
            if ($listbulan->tahun_tiga ==null) {
                $listbulan->tahun_tiga = 1;
            }else {
                $listbulan->tahun_tiga = $listbulan->tahun_dua+1;
            }
        }elseif ($tahun == 4) {
            if ($listbulan->tahun_empat ==null) {
                $listbulan->tahun_empat = 1;
            }else {
                $listbulan->tahun_empat = $listbulan->tahun_empat+1;
            };
        }elseif ($tahun == 5) {
            if ($listbulan->tahun_lima ==null) {
                $listbulan->tahun_lima = 1;
            }else {
                $listbulan->tahun_lima = $listbulan->tahun_lima+1;
            }
        }elseif ($tahun == 6) {
            if ($listbulan->tahun_enam ==null) {
                $listbulan->tahun_enam = 1;
            }else {
                $listbulan->tahun_enam = $listbulan->tahun_enam+1;
            }
        }elseif ($tahun == 7) {
            if ($listbulan->tahun_tujuh ==null) {
                $listbulan->tahun_tujuh = 1;
            }else {
                $listbulan->tahun_tujuh = $listbulan->tahun_tujuh+1;
            }
        }elseif ($tahun == 8) {
            if ($listbulan->tahun_delapan ==null) {
                $listbulan->tahun_delapan = 1;
            }else {
                $listbulan->tahun_delapan = $listbulan->tahun_delapan+1;
            }
        }elseif ($tahun == 9) {
            if ($listbulan->tahun_sembilan ==null) {
                $listbulan->tahun_sembilan = 1;
            }else {
                $listbulan->tahun_sembilan = $listbulan->tahun_sembilan+1;
            }
        }
        $listbulan->save();

        $listtahun = Tahun::find($tahun);
        $listtahun->buat_surat_id = $laporan->id;
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
