<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $idnosurat = array(1,2,3,4);
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');
        $judul = 'Nomor Surat';
        $authuser = Auth::user();
        $nosurat = NomorSurat::all();
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $nomorid = LaporanSurat::all()->last()->id;
        $nomor = LaporanSurat::find($nomorid);
        $laporan = LaporanSurat::find($laporanid);

        return view('surat.nosurat.index', compact('judul', 'tahun', 'nomor', 'bulan','nosurat', 'laporan', 'authuser'));
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
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $laporan = LaporanSurat::find($laporanid);
        $this->validate($request, [
            'nomor_surat'=> 'required',
        ]);

        $nosurat=new LaporanSurat();
        $nosurat->user_id=Auth::user()->id;
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();

        return redirect()->route('nomor.edit',$laporanid)->with('sukses', 'berhasil disimpan');
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
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');
        $judul = 'Nomor Surat';
        $authuser = Auth::user();
        $nosurat = NomorSurat::all();
        $nomorid = LaporanSurat::all()->last()->id;
        $nomor = LaporanSurat::find($nomorid);
        $laporan = LaporanSurat::find($id);
        

        return view('surat.nosurat.edit', compact('judul', 'bulan', 'tahun', 'nomor','nosurat', 'laporan', 'authuser'));
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
            'nomor_surat'=> 'required',
        ]);

        $nosurat=LaporanSurat::find($id);
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();

        return redirect()->route('nomor.edit', $id)->with('sukses', 'berhasil disimpan');
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
