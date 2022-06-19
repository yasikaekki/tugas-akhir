<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TubuhSurat;
use Auth;
use DB;

class TubuhSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $judul = 'Tubuh Surat';
        $uid = Auth::id();
        $tubuhid = TubuhSurat::all()->where('user_id', $uid);
        $tubuh = count($tubuhid);
        $isiid = TubuhSurat::all()->last()->id;
        $isi= TubuhSurat::find($isiid);

        return view('surat.tubuhsurat.index',compact('judul','isi','tubuh'));
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
        $tubuhsurat=TubuhSurat::find($id);
        $tubuhsurat->tanggal=$request->jam;
        $tubuhsurat->jam=$request->jam;
        $tubuhsurat->acara=$request->acara;                              
        
        if($tubuhsurat->hari == null || $tubuhsurat->tanggal == null || $tubuhsurat->jam == null || $tubuhsurat->acara == null){
            
            $tubuhsurat->created_at=\Carbon\Carbon::now();
            $tubuhsurat->save();
            
            return redirect()->route('tubuh.index')->with('sukses', 'Nomor surat berhasil disimpan');
        }else{
            
            $tubuhsurat->updated_at=\Carbon\Carbon::now();
            $tubuhsurat->save();
            
            return redirect()->route('tubuh.index')->with('sukses', 'Nomor surat berhasil diperbarui');
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
