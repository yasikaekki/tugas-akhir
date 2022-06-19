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
        $hariini = LaporanSurat::whereDay('created_at', '=', $hari)->get();
        $bulanini = LaporanSurat::whereMonth('created_at', '=', $bulan)->get();
        $tahunini = LaporanSurat::whereYear('created_at', '=', $tahun)->get();

        return view('home', compact('judul', 'hariini', 'bulanini','tahunini', 'laporan'));
    }
}
