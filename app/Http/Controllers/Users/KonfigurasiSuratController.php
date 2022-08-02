<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KonfigurasiSurat;
use DB;

class KonfigurasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Konfigurasi Surat';
        $konfigurasiid = DB::table('konfigurasi_surats')->select('id')->value('id');
        $konfigurasi = KonfigurasiSurat::find($konfigurasiid);

        return view('konfigurasi.index', compact('judul', 'konfigurasi'));
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

    public function submit(Request $request, $id)
    {
        $this->validate($request, [
            'nama_upt'=> 'required',
            'logo_upt'=> 'required',
            'logo_ttd'=> 'required',
        ],
        [
            'nama_upt.required'=> 'Nama UPT harus diisi',
            'logo_upt.required'=> 'Logo UPT harus diisi',
            'logo_stempel'=> 'Stempel harus diisi',
        ]
    );

        $kopsurat= KonfigurasiSurat::find($id);

        if ($request->hasFile('logo_upt')) {
            $file = $request->file('logo_upt');
            $nama_file = time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = 'assets/logo upt/';
            $file->move($tujuan_upload, $nama_file);
            $kopsurat->logo_upt = $nama_file;
        }

        if ($request->hasFile('logo_stempel')) {
            $stempel = $request->file('logo_stempel');
            $nama_gambar = time() . "." . $stempel->getClientOriginalExtension();
            $lokasi_upload = 'assets/stempel/';
            $stempel->move($lokasi_upload, $nama_gambar);
            $kopsurat->logo_stempel = $nama_gambar;
        }
    
        $kopsurat->nama_upt=$request->nama_upt;
        $kopsurat->save();

        return redirect()->route('konfigurasi-surat.index')->with('sukses', 'Konfigurasi surat berhasil disimpan');
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
        $kopsurat= KonfigurasiSurat::find($id);

        if ($request->hasFile('logo_upt')) {
            $file = $request->file('logo_upt');
            $nama_file = time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = 'assets/logo upt/';
            $file->move($tujuan_upload, $nama_file);
            $kopsurat->logo_upt = $nama_file;
        }

        if ($request->hasFile('logo_stempel')) {
            $stempel = $request->file('logo_stempel');
            $nama_gambar = time() . "." . $stempel->getClientOriginalExtension();
            $lokasi_upload = 'assets/stempel/';
            $stempel->move($lokasi_upload, $nama_gambar);
            $kopsurat->logo_stempel = $nama_gambar;
        }
    
        $kopsurat->nama_upt=$request->nama_upt;
        $kopsurat->save();

        return redirect()->route('konfigurasi-surat.index')->with('sukses', 'Konfigurasi surat berhasil diubah');      
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
