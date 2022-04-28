<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LaporanSurat;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $judul = 'Beranda';
        $uid = Auth::id();
        $laporanid = DB::table('laporan_surats')->select('id')->value('id');
        $laporan = LaporanSurat::find($laporanid);
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $hariini = DB::table('laporan_surats')->where('user_id',$uid)->orWhere('created_at', $hari)->get();
        $bulanini = DB::table('laporan_surats')->where('user_id',$uid)->orWhere('created_at', $bulan)->get();
        $tahunini = DB::table('laporan_surats')->where('user_id',$uid)->orWhere('created_at', $tahun)->get();
        // $explode=explode("-",$str);
        $jumlahhari = count($hariini);
        $jumlahbulan = count($bulanini);
        $jumlahtahun = count($tahunini);

        return view('home', compact('judul', 'jumlahhari', 'jumlahbulan','jumlahtahun', 'laporan'));
    }
}
