<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Model\KonfigurasiKopSurat;
use App\Model\BuatSurat;
use App\Model\TubuhSurat;
use App\Model\CetakSurat;
use App\Model\LaporanSurat;
use App\User;
use App\Tahun;
use Auth;
use DB;

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
        $judul = "List Surat Keluar";
        $no = 1;
        $laporan = LaporanSurat::all();
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);

        if($request->filter_sort == 1){
            $laporan = LaporanSurat::orderBy('created_at', 'asc')->paginate(5);
        }elseif ($request->filter_sort == 2) {
            $laporan = LaporanSurat::orderBy('created_at', 'desc')->paginate(5);
        }


        return view('list-surat.index', compact('judul', 'tahun','surat', 'no', 'data', 'laporan', 'pembuka' ,'penutup'));
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
        $judul ="Detail Surat Keluar";
        $data = Crypt::decrypt($id);
        $laporans = CetakSurat::find($data);

        $kop1 = "KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI";
        $kop2 = "POLITEKNIK NEGERI BANYUWANGI";
        $upt = DB::table('konfigurasi_kop_surats')->select('id')->value('id');
        $kop3 = "UPT KEWIRAUSAHAAN DAN INKUBATOR BISNIS TEKNOLOGI";
        $kop4 = KonfigurasiKopSurat::find($upt);
        $kop5 = "Jl. Raya Jember Kilometer 23 Labanasem, Kabat, Banyuwangi, 68461 Telepon (0333) 636780";
        $kop6 = "E-mail: poliwangi@poliwangi.ac.id : Laman : http://www.poliwangi.ac.id";
        $cetak = CetakSurat::find($data);


        return view('list-surat.show', compact('judul','laporans','cetak', 'data','kop1', 'kop2', 'kop3','kop4', 'kop5', 'kop6'));
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
        // $kode=BuatSurat::find($id);
        // $nomor=NomorSurat::find($kode->nomor_surat_id);
        // if ($nomor->cetak_surat_id == null) {
        //     # code...
        //     $nomor->cetak_surat_id = 1;
        // } else {
        //     # code...
        //     $nomor->cetak_surat_id = $kode->id+1;
        // }

        $surat = BuatSurat::find($id);
        $surat->perihal=$request->perihal;
        $surat->kepada=$request->kepada;
        $surat->isi_pembuka=$request->isi_pembuka;   
        $surat->isi_penutup=$request->isi_penutup;                  
        $surat->created_at=\Carbon\Carbon::now();
        $surat->save();

        $agenda = TubuhSurat::find($id);
        $agenda->tanggal = $request->tanggal;
        $agenda->acara = $request->acara;
        $agenda->jam = $request->jam;
        $agenda->tempat = $request->tempat;
        $agenda->save();

        return redirect()->route('list-surat.index')->with('sukses', 'Surat berhasil diperbarui');
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
