<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
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
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');
        $judul = 'Nomor Surat';
        $nosurat = NomorSurat::all();
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $pembukaid = DB::table('surat_pembukas')->select('id')->value('id');
        $nomorid = LaporanSurat::all()->last()->id;
        $no = LaporanSurat::find($nomorid);
        $nomor = LaporanSurat::find($laporanid);
        $pembuka = SuratPembuka::find($pembukaid);
        $laporan = LaporanSurat::find($laporanid);

        return view('surat.nosurat.index', compact('judul', 'tahun', 'no', 'nomor','bulan','nosurat', 'laporan','pembuka'));
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
        $id = DB::table('laporan_surats')->select('id')->value('id');
        $laporan = LaporanSurat::find($id);
        $this->validate($request, [
            'nomor_surat'=> 'required',
        ]);

        $nosurat=new LaporanSurat();
        $nosurat->user_id=Auth::user()->id;
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();

        $pembuka=new SuratPembuka();
        $pembuka->user_id=Auth::user()->id;
        $pembuka->created_at=\Carbon\Carbon::now();
        $pembuka->updated_at=\Carbon\Carbon::now();
        $pembuka->save();

        return redirect()->route('nomor.edit',$laporan)->with('sukses', 'Nomor surat berhasil disimpan');
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
        $uid = LaporanSurat::all()->last()->id;
        $no = LaporanSurat::find($uid);
        $nosurat = NomorSurat::all();
        $nomor = LaporanSurat::find($id);
        $laporan = LaporanSurat::find($id);
        $pembuka = SuratPembuka::find($id);

        return view('surat.nosurat.edit', compact('no','pembuka' ,'judul', 'nomor','bulan', 'tahun', 'nosurat', 'laporan'));
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
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();
        $laporan=new LaporanSurat();
        $laporan->user_id=Auth::user()->id;
        $laporan->save();
        $pembuka=new SuratPembuka();
        $pembuka->user_id=Auth::user()->id;
        $pembuka->created_at=\Carbon\Carbon::now();
        $pembuka->updated_at=\Carbon\Carbon::now();
        $pembuka->save();

        if ($nosurat->nomor_surat == null) {            
            return redirect()->route('nomor.edit', $id)->with('sukses', 'Nomor surat berhasil disimpan');
        }else {
            return redirect()->route('nomor.edit', $id)->with('sukses', 'Nomor surat berhasil diperbarui');
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
