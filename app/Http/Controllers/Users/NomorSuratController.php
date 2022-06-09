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
        $no =1;
        $judul = 'Nomor Surat';
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $pembukaid = DB::table('surat_pembukas')->select('id')->value('id');
        $nomorid = LaporanSurat::all()->last()->id;
        $jenissurat = NomorSurat::all();
        $nomor = LaporanSurat::find($laporanid);
        $pembuka = SuratPembuka::find($pembukaid);

        return view('surat.nosurat.index', compact('judul', 'nomor', 'jenissurat','pembuka', 'bulan', 'tahun'));
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
        $nosurat=LaporanSurat::find($id);
        $nosurat->nomor_surat_id=$request->nomor_surat_id;
        $nosurat->no_surat=$request->no_surat;                        
        
        if ($nosurat->nomor_surat == null) {
            
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
