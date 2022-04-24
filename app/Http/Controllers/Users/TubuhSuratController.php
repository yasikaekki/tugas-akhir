<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TubuhSurat;
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
        $tubuhid = DB::table('tubuh_surats')->select('id')->value('id');
        $tubuh = TubuhSurat::find($tubuhid);

        return view('surat.tubuhsurat.index',compact('judul','tubuh'));
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
        $this->validate($request, [
            'hari'=> 'required',
            'tanggal'=> 'required',
            'jam'=> 'required',
            'acara'=> 'required',
        ]);

        $tubuhsurat=TubuhSurat::find($id);
        $tubuhsurat->hari=$request->hari;
        $tubuhsurat->tanggal=$request->tanggal;
        $tubuhsurat->jam=$request->jam;
        $tubuhsurat->acara=$request->acara;
        $tubuhsurat->created_at=\Carbon\Carbon::now();
        $tubuhsurat->updated_at=\Carbon\Carbon::now();
        $tubuhsurat->save();                              
        
        if($tubuhsurat->hari == null || $tubuhsurat->tanggal == null || $tubuhsurat->jam == null || $tubuhsurat->acara == null){
            return redirect()->route('tubuh.index')->with('sukses', 'Nomor surat berhasil disimpan');
        }else{
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
