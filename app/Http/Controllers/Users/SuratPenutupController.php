<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPenutup;
use DB;

class SuratPenutupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Surat Penutup';

        return view('surat.suratpenutup.index', compact('judul'));
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
        $suratpenutup=SuratPenutup::find($id);
        $suratpenutup->isi_surat_penutup=$request->isi_surat_penutup;
        $suratpenutup->created_at=\Carbon\Carbon::now();
        $suratpenutup->updated_at=\Carbon\Carbon::now();
        $suratpenutup->save();

        if($suratpenutup->isi_surat_penutup == null){
            return redirect()->route('penutup.index')->with('sukses', 'Nomor surat berhasil disimpan');
        }else{
            return redirect()->route('penutup.index')->with('sukses', 'Nomor surat berhasil diperbarui');
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
