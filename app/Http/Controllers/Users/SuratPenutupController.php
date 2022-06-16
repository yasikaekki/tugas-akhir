<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SuratPenutup;
use Auth;
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
        $uid = Auth::id();
        $penutupid = SuratPenutup::all()->where('user_id', $uid);
        $penutup = count($penutupid);
        $isiid = SuratPenutup::all()->last()->id;
        $isi= SuratPenutup::find($isiid);

        return view('surat.suratpenutup.index', compact('judul', 'isi','penutup'));
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
        $suratpenutup=SuratPenutup::find($id);
        $suratpenutup->isi_surat_penutup=$request->isi_surat_penutup;

        if($suratpenutup->isi_surat_penutup == null){
            
            $suratpenutup->created_at=\Carbon\Carbon::now();
            $suratpenutup->save();

            return redirect()->route('penutup.index')->with('sukses', 'Penutup surat berhasil disimpan');
        }else{
            
            $suratpenutup->updated_at=\Carbon\Carbon::now();
            $suratpenutup->save();
            
            return redirect()->route('penutup.index')->with('sukses', 'Penutup surat berhasil diperbarui');
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
