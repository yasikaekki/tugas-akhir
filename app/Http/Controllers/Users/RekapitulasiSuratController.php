<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NomorSurat;
use App\Tahun;
use App\Bulan;
use Auth;
use DB;

class RekapitulasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $no = 1;
        $judul = 'Rekapitulasi Bulan';
        $listbulan = Bulan::all();
        $tahun = Tahun::all();
        $kata = $request->fitur_filter;
        $array = array(2022=>1,2,3,4,5,6,7,8,9);
        $year = $array[date('Y')];
        $keywoard = Tahun::find($year);
        $arrdata = array();
        $arrbulan = array();
        foreach ($listbulan as $rekaps) {
            $arrbulan[] = $rekaps->nama_bulan;
            if ($keywoard->id == 1) {
                $arrdata[] = $rekaps->tahun_satu;
            }elseif ($keywoard->id == 2) {
                $arrdata[] = $rekaps->tahun_dua;
            }elseif ($keywoard->id == 3) {
                $arrdata[] = $rekaps->tahun_tiga;
            }elseif ($keywoard->id == 4) {
                $arrdata[] = $rekaps->tahun_empat;
            }elseif ($keywoard->id == 5) {
                $arrdata[] = $rekaps->tahun_lima;
            }elseif ($keywoard->id == 6) {
                $arrdata[] = $rekaps->tahun_enam;
            }elseif ($keywoard->id == 7) {
                $arrdata[] = $rekaps->tahun_tujuh;
            }elseif ($keywoard->id == 8) {
                $arrdata[] = $rekaps->tahun_delapan;
            }elseif ($keywoard->id == 9) {
                $arrdata[] = $rekaps->tahun_sembilan;
            }
        }

        if($request->fitur_filter){
            $keywoard = Tahun::find($kata);
            $tahun = Tahun::all()->where('id', $request->fitur_filter);
            $arrdata = array();
            $arrbulan = array();
            foreach ($listbulan as $rekaps) {
                $arrbulan[] = $rekaps->nama_bulan;
                if ($keywoard->id == 1) {
                    $arrdata[] = $rekaps->tahun_satu;
                }elseif ($keywoard->id == 2) {
                    $arrdata[] = $rekaps->tahun_dua;
                }elseif ($keywoard->id == 3) {
                    $arrdata[] = $rekaps->tahun_tiga;
                }elseif ($keywoard->id == 4) {
                    $arrdata[] = $rekaps->tahun_empat;
                }elseif ($keywoard->id == 5) {
                    $arrdata[] = $rekaps->tahun_lima;
                }elseif ($keywoard->id == 6) {
                    $arrdata[] = $rekaps->tahun_enam;
                }elseif ($keywoard->id == 7) {
                    $arrdata[] = $rekaps->tahun_tujuh;
                }elseif ($keywoard->id == 8) {
                    $arrdata[] = $rekaps->tahun_delapan;
                }elseif ($keywoard->id == 9) {
                    $arrdata[] = $rekaps->tahun_sembilan;
                }
            }
            if($keywoard->rekapitulasi_surat_id == null) {
                $tahun =Tahun::all();
            }else {
                $tahun =Tahun::all();
            }
        }
        return view('rekapitulasi.bulan.index', compact('no','arrdata','arrbulan' ,'judul','listbulan', 'keywoard','tahun'));
    }

    public function jenis_surat(Request $request) 
    {
        $no = 1;
        $judul = 'Rekapitulasi Jenis Surat';
        $nomor = NomorSurat::all();
        $tahun = Tahun::all();
        $kata = $request->fitur_filter;
        $array = array(2022=>1,2,3,4,5,6,7,8,9);
        $year = $array[date('Y')];
        $keywoard = Tahun::find($year);

        $arrnomor = array();
        $arrjenis = array();
        foreach ($nomor as $nomors) {
            if ($keywoard->id == 1) {
                $arrnomor[] = $nomors->tahun_satu;
            }elseif ($keywoard->id == 2) {
                $arrnomor[] = $nomors->tahun_dua;
            }elseif ($keywoard->id == 3) {
                $arrnomor[] = $nomors->tahun_tiga;
            }elseif ($keywoard->id == 4) {
                $arrnomor[] = $nomors->tahun_empat;
            }elseif ($keywoard->id == 5) {
                $arrnomor[] = $nomors->tahun_lima;
            }elseif ($keywoard->id == 6) {
                $arrnomor[] = $nomors->tahun_enam;
            }elseif ($keywoard->id == 7) {
                $arrnomor[] = $nomors->tahun_tujuh;
            }elseif ($keywoard->id == 8) {
                $arrnomor[] = $nomors->tahun_delapan;
            }elseif ($keywoard->id == 9) {
                $arrnomor[] = $nomors->tahun_sembilan;
            }
            $arrjenis[] = $nomors->jenis_surat;
        }

        if($request->fitur_filter){
            $keywoard = Tahun::find($kata);
            $tahun = Tahun::all()->where('id', $request->fitur_filter);
            $arrnomor = array();
            $arrjenis = array();
            foreach ($nomor as $nomors) {
                if ($keywoard->id == 1) {
                    $arrnomor[] = $nomors->tahun_satu;
                }elseif ($keywoard->id == 2) {
                    $arrnomor[] = $nomors->tahun_dua;
                }elseif ($keywoard->id == 3) {
                    $arrnomor[] = $nomors->tahun_tiga;
                }elseif ($keywoard->id == 4) {
                    $arrnomor[] = $nomors->tahun_empat;
                }elseif ($keywoard->id == 5) {
                    $arrnomor[] = $nomors->tahun_lima;
                }elseif ($keywoard->id == 6) {
                    $arrnomor[] = $nomors->tahun_enam;
                }elseif ($keywoard->id == 7) {
                    $arrnomor[] = $nomors->tahun_tujuh;
                }elseif ($keywoard->id == 8) {
                    $arrnomor[] = $nomors->tahun_delapan;
                }elseif ($keywoard->id == 9) {
                    $arrnomor[] = $nomors->tahun_sembilan;
                }
                $arrjenis[] = $nomors->jenis_surat;
            }
            if($keywoard->rekapitulasi_surat_id == null) {
                $tahun =Tahun::all();
            }else {
                $tahun =Tahun::all();
            }
        } 
        return view('rekapitulasi.jenis_surat.index', compact('no','arrjenis','arrnomor','judul','nomor','keywoard','tahun'));
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
