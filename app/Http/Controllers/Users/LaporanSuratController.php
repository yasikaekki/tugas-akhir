<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use App\User;
use Auth;
use DB;

class LaporanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // if ($request->fitur_cari) {
        //     $laporan = LaporanSurat::all()->with('user')->where('name','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('gelar','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('jabatan','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('no_surat','like','%'.$request->fitur_cari.'%')
        //     ->orWhere('no_nip','like','%'.$request->fitur_cari.'%')
        //     ->orderBy('created_at','desc')
        //     ->paginate(10);
        // }
        
        $judul = 'Laporan Surat Keluar';
        $no = 1;
        $laporan = LaporanSurat::all();
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);

        if($request->filter_sort == 1){
            $laporan = LaporanSurat::orderBy('created_at', 'asc')->paginate(5);
        }elseif ($request->filter_sort == 2) {
            $laporan = LaporanSurat::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('laporan.index', compact('judul', 'surat', 'no', 'data', 'laporan'));
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
