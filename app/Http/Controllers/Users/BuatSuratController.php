<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Model\KonfigurasiKopSurat;
use App\Model\BuatSurat;
use App\Model\TubuhSurat;
use App\Model\CetakSurat;
use App\NomorSurat;
use App\User;
use Auth;
use DB;

class BuatSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        $uid = Auth::id();
        $judul = 'Buat Surat';
        $nomor= NomorSurat::all();
        $laporan = BuatSurat::all();
        $noid = count($laporan);
        $surat = BuatSurat::find($noid);
        $cetakall = CetakSurat::all();
        $cetakid = count($cetakall);
        $cetak = CetakSurat::find($cetakid);

        return view('surat.index', compact('judul', 'cetak','pembuka' ,'penutup','nomor','noid','laporan','surat'));
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
        $judul ="Ubah Surat Keluar";
        $data = Crypt::decrypt($id);
        $surat = BuatSurat::find($data);

        return view('surat.index', compact('judul','surat'));
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
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];

        $surat=BuatSurat::find($id);
        $all = BuatSurat::all();
        $kode = count($all);

        $surat->nomor_surat_id=$request->nomor_surat_id;
        $kodesurat = $request->no_surat.$kode.".".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');      
        $surat->no_surat=$kodesurat;   
        $surat->lampiran=$request->lampiran;
        $surat->perihal=$request->perihal;
        $surat->kepada=$request->kepada;
        $surat->isi_pembuka=$request->isi_pembuka;   
        $surat->isi_penutup=$request->isi_penutup;                  
        $surat->created_at=\Carbon\Carbon::now();
        $surat->save();

        $tujuan = TubuhSurat::find($id);
        $tujuan->buat_surat_id = $request->buat_surat_id;
        $tujuan->save();

        $isi = CetakSurat::find($id);
        $isi->buat_surat_id = $tujuan->id;
        $isi->tubuh_surat_id = $tujuan->buat_surat_id;
        $isi->save();
        
        return redirect()->route('surat.index')->with('sukses', 'Surat berhasil dibuat');
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
