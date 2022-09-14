<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Model\BuatSurat;
use App\Model\TubuhSurat;
use App\Model\LaporanSurat;
use App\NomorSurat;
use App\User;
use App\Bulan;
use App\Tahun;

class ListSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $arrpembuka = [
            'Bersama surat ini Kami ingin memberi tahukan bahwa',
            'Bersama ini Kami UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi ingin mengajukan permohonan',
            'Sehubungan dengan salah satu tugas UPT Kewirausahaan dan Inkubator Bisnis Teknologi ialah sebagai inkubator bisnis teknologi (Inkubistek) di Politeknik Negeri Banyuwangi. Untuk menunjang tugas tersebut, perlu diadakan tugas berupa',
            'Bersama Ini Kami UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi memberitahukan, sehubungan dengan adanya rangkaian kegiatan Program Inkubator Bisnis Teknologi dan Kewirausahaan, Kami ingin menyelenggarakan',
            'Sehubungan dengan akan dilaksanakannya kegiatan Evaluasi dan Pemaparan PROKER (Program Kerja) yang diselenggarakan oleh UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi, maka dengan ini kami mengundang Bapak dan Memohon dengan hormat kehadiran Bapak dalam acara tersebut yang akan dilaksanakan pada:',
            'Bersama Ini Kami UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi ingin mengajukan permohonan peminjaman Alat, dengan adanya rangkaian Program Fasilitasi Inkubator, Kami ingin menyelenggarakan Evaluasi dan Pemaparan PROKER (Program Kerja), Untuk mendukung terselenggaranya kegiatan, Kami mohon untuk dijinkan menggunakan alat sebagaimana yang terlampir guna sebagai pendukung kelancaran acara tersebut. Kegiatan ini akan dilaksanakan pada:',
        ];

        $arrpenutup = [
            'Demikian surat ini Kami sampaikan. Atas segala perhatian dan kerjasama Anda, kami ucapkan terima kasih.',
            'Demikianlah surat pemberitahuan ini Kami sampaikan, atas perhatian dan kerjasamanya, Kami ucapkan terima kasih.',
            'Demikian surat pengajuan kegiatan ini Kami sampaikan, atas  perhatian Bapak diucapkan terima kasih.',
            'Demikian surat undangan ini kami sampaikan, atas perhatian dan kerjasama Bapak kami ucapkan terima kasih',
        ];

        $pembuka = Arr::random($arrpembuka);
        $penutup = Arr::random($arrpenutup);
        $tahun=Tahun::all();
        $bulan = Bulan::all();
        $judul = "List Surat Keluar";
        $no = 1;
        $laporan = LaporanSurat::paginate(6);
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);
        $nomor = NomorSurat::all();
        
        if($request->filter_sort == 'asc'){
            $laporan = LaporanSurat::orderBy('created_at', 'asc')->paginate(6);
        }elseif ($request->filter_sort == 'desc') {
            $laporan = LaporanSurat::orderBy('created_at', 'desc')->paginate(6);
        }elseif ($request->filter_bulan) {
            $laporan= LaporanSurat::whereMonth('created_at', $request->filter_bulan)->paginate(6);
        }elseif ($request->filter_tahun) {
            $laporan = LaporanSurat::whereYear('created_at', $request->filter_tahun)->paginate(6);
        }

        return view('list-surat.index', compact('judul','nomor', 'data','bulan','tahun','no', 'laporan', 'pembuka' ,'penutup'));
    }

    public function laporan(Request $request)
    {
        //      
        $judul = 'Laporan Surat Keluar';
        $no = 1;
        $laporan = LaporanSurat::paginate(6);
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);
        $katatahun = $request->filter_tahun;
        $katabulan = $request->filter_bulan;
        $bulan = Bulan::all();
        $tahun = Tahun::all();

        if($request->filter_sort == "asc"){
            $laporan = LaporanSurat::orderBy('created_at', 'asc')->paginate(6);
        }elseif ($request->filter_sort == "desc") {
            $laporan = LaporanSurat::orderBy('created_at', 'desc')->paginate(6);
        }elseif ($request->filter_bulan) {
            $laporan= LaporanSurat::whereMonth('created_at', $request->filter_bulan)->paginate(6);
        }elseif ($request->filter_tahun) {
            $laporan = LaporanSurat::whereYear('created_at', $request->filter_tahun)->paginate(6);
        }

        return view('laporan.index', compact('judul','tahun','bulan' ,'surat', 'no', 'data', 'laporan'));
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
        $judul ="Detail Surat Keluar";
        $data = Crypt::decrypt($id);
        $laporans = BuatSurat::find($data);

        $kop1 = "POLITEKNIK NEGERI BANYUWANGI";
        $kop2 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop3 = "E-mail: poliwangi@poliwangi.ac.id ; Laman : http://www.poliwangi.ac.id";
        $cetak = BuatSurat::find($data);


        return view('list-surat.show', compact('judul','laporans','cetak', 'data','kop1', 'kop2', 'kop3'));
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
