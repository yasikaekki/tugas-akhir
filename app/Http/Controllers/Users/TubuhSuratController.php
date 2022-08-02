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
        $tubuhid = TubuhSurat::all();
        $tubuh = count($tubuhid);
        $isi= TubuhSurat::find($tubuh);

        return view('agenda.index',compact('judul','isi','tubuh'));
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
            'tanggal' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
        ],
        [
            'tanggal.required'=>'Hari dan tanggal harus diisi',
            'jam.required'=>'Jam harus diisi',
            'tempat.required'=>'Tempat harus diisi',
        ]
    );
        
        $tubuhsurat=TubuhSurat::find($id);
        $tubuhsurat->tanggal=$request->tanggal;
        $tubuhsurat->jam=$request->jam;
        $tubuhsurat->acara=$request->acara;                              
        $tubuhsurat->tempat=$request->tempat;                                   
        $tubuhsurat->created_at=\Carbon\Carbon::now();
        $tubuhsurat->save();
        
        return redirect()->route('surat-agenda.index')->with('sukses', 'Agenda surat berhasil disimpan');  
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
        $tubuhsurat->tanggal=$request->tanggal;
        $tubuhsurat->jam=$request->jam;
        $tubuhsurat->acara=$request->acara;                              
        $tubuhsurat->tempat=$request->tempat;                                   
        $tubuhsurat->created_at=\Carbon\Carbon::now();
        $tubuhsurat->save();
        
        return redirect()->route('surat-agenda.index')->with('sukses', 'Agenda surat berhasil diubah');    
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
