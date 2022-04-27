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
        $no =1;
        $judul = 'Nomor Surat';
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $pembukaid = DB::table('surat_pembukas')->select('id')->value('id');
        $nomorid = LaporanSurat::all()->last()->id;
        $jenissurat = NomorSurat::all();
        // $no = LaporanSurat::find($laporanid);
        $nomor = LaporanSurat::find($laporanid);
        $pembuka = SuratPembuka::find($pembukaid);
        // $laporan = LaporanSurat::find($laporanid);

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
        $judul = 'Buat Nomor Surat';
        $nomor = NomorSurat::all();
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $tahun = date('Y');

        return view('surat.nosurat.create', compact('judul', 'nomor', 'bulan', 'tahun'));
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
            'jenis_surat'=> 'required',
        ]);

        $nosurat=new LaporanSurat();
        $nosurat->user_id=Auth::user()->id;
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->jenis_surat=$request->jenis_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();

        return redirect()->route('nomor.edit',$laporan->id)->with('sukses', 'Nomor surat berhasil disimpan');
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
        // $uid = LaporanSurat::all()->last()->id;
        // $no = LaporanSurat::find($uid);
        $nosurat = NomorSurat::all();
        $nomor = LaporanSurat::find($id);
        $laporan = LaporanSurat::find($id);
        $pembuka = SuratPembuka::find($id);

        return view('surat.nosurat.edit', compact('pembuka' ,'judul', 'nomor','bulan', 'tahun', 'nosurat', 'laporan'));
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
        // $this->validate($request, [
        //     'jenis_surat'=> 'required',
        // ]);

        $nosurat=LaporanSurat::find($id);
        $nosurat->id_no_surat=$request->id_no_surat;
        $nosurat->nomor_surat=$request->nomor_surat;
        $nosurat->created_at=\Carbon\Carbon::now();
        $nosurat->updated_at=\Carbon\Carbon::now();
        $nosurat->save();                              
        
        if ($nosurat->nomor_surat == null) {
            return redirect()->route('nomor.index')->with('sukses', 'Nomor surat berhasil disimpan');
        } else {
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
