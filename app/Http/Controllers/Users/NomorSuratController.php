<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPembuka;
use App\Model\LaporanSurat;
use App\NomorSurat;
use App\User;
use Auth;
use DB;

class NomorSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid = Auth::id();
        $judul = 'Nomor Surat';
        $laporan = NomorSurat::all();
        $laporanid = LaporanSurat::all()->where('user_id', $uid);
        // $data = $laporan->where('user_id', $uid);
        $noid = count($laporanid);
        $nomorid = LaporanSurat::get()->last()->id;
        $nomor= LaporanSurat::find($nomorid);

        return view('surat.nosurat.index', compact('judul', 'nomor','noid','laporan'));
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
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $nosurat=LaporanSurat::find($id);
        $all = LaporanSurat::all();
        $kode = count($all);
        $nosurat->nomor_surat_id=$request->nomor_surat_id;
        $kodesurat = $request->no_surat.$kode.".".$nosurat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');      
        $nosurat->no_surat=$kodesurat;                        
        
        if ($nosurat->nomor_surat_id == null  && $nosurat->no_surat == null) {
            
            $nosurat->created_at=\Carbon\Carbon::now();
            $nosurat->save();
            
            return redirect()->route('nomor.index')->with('sukses', 'Nomor surat berhasil disimpan');
        } else {
            
            $nosurat->updated_at=\Carbon\Carbon::now();
            $nosurat->save();
            
            return redirect()->route('nomor.index')->with('sukses', 'Nomor surat berhasil diperbarui');
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
