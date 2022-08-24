<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\KonfigurasiSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Model\BuatSurat;
use App\NomorSurat;
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
            'Sehubungan dengan akan dilaksanakannya kegiatan Evaluasi dan Pemaparan PROKER (Program Kerja) 2022 kegiatan Program Inkubator bisnis tehnologi dan kewirausahaan yang diselenggarakan oleh UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi, maka dengan ini kami turut mengundangan Bapak/Ibu Tenant dan Memohon Kehadiran Bapak/Ibu tenant dalam acara tersebut yang akan dilaksanakan pada:',
            'Sehubungan dengan salah satu tugas UPT Kewirausahaan dan Inkubator Bisnis Teknologi ialah sebagai inkubator bisnis teknologi (Inkubistek) di Politeknik NegeriBanyuwangi. Untuk menunjang tugas tersebut, perlu dilakukan kegiatan berupa Evaluasi dan Pemaparan Program Kerja 2022, yang dilakukan untuk mengevaluasi tenant dan untuk persiapan terkait rencana kegiatan yang akan terlaksana pada tahun ini dalam Program inkubasi bisnis dan Politeknik Negeri Banyuwangi. Yang dilakukan dalam 3 Tahap Kegiatan, yakni Pemaparan Program Kerja 2022, Evaluasi Tenant, kemudian dilanjutkan dengan sesi tanya jawab dan open discusstion tenant. Adapun detail kegiatan dapat dilihat pada Kerangka Acuan Kegiatan Terlampir.',
            'Bersama Ini Kami UPT Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi memberitahukan, sehubungan dengan adanya rangkaian kegiatan Program Inkubator Bisnis Teknologi dan Kewirausahaan, Kami ingin menyelenggarakan Evaluasi dan Pemaparan PROKER (Program Kerja) 2022. Dengan ini Kami memohon ijin untuk melaksanakan kegiatan tersebut pada:',
            'Sehubungan dengan akan dilaksanakannya kegiatan Evaluasi dan Pemaparan PROKER (Program Kerja) 2022 yang diselenggarakan oleh UPT Kewirausahaan dan Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi, maka dengan ini kami mengundang Bapak dan Memohon dengan hormat kehadiran Bapak dalam acara tersebut yang akan dilaksanakan pada:',
            'Bersama Ini Kami UPT Inkubator Bisnis Teknologi Politeknik Negeri Banyuwangi ingin mengajukan permohonan peminjaman Alat, dengan adanya rangkaian Program Fasilitasi Inkubator, Kami ingin menyelenggarakan Evaluasi dan Pemaparan PROKER (Program Kerja) 2022, Untuk mendukung terselenggaranya kegiatan, Kami mohon untuk diijinkan menggunakan alat sebagaimana yang terlampir guna sebagai pendukung kelancaran acara tersebut. Kegiatan ini akan dilaksanakan pada:',
        ];

        $arrpenutup = [
            'Demikian surat ini Kami sampaikan. Atas segala perhatian dan kerjasama Anda, kami ucapkan terima kasih.',
            'Demikianlah surat pemberitahuan ini Kami sampaikan, atas perhatian dan kerjasamanya, Kami ucapkan terima kasih.',
            'Demikian surat pengajuan kegiatan ini Kami sampaikan, atas  perhatian Bapak diucapkan terima kasih.',
            'Demikian surat undangan ini kami sampaikan, atas perhatian dan kerjasama Bapak kami ucapkan terima kasih',
        ];

        $pembuka = Arr::random($arrpembuka);
        $penutup = Arr::random($arrpenutup);

        $judul = 'Buat Surat';
        $nomor= NomorSurat::all();
        $laporan = BuatSurat::all();
        $noid = count($laporan);
        $surat = BuatSurat::find($noid);
        $konfigurasiid = DB::table('konfigurasi_surats')->select('id')->value('id');
        $konfigurasi =KonfigurasiSurat::find($konfigurasiid);

        return view('surat.index', compact('judul', 'konfigurasi','pembuka' ,'penutup','nomor','laporan','surat'));
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
        $judul ="Ubah Surat Keluar";
        $data = Crypt::decrypt($id);
        $surat = BuatSurat::find($data);

        return view('surat.index', compact('judul','surat'));
    }

    public function submit(Request $request, $id)
    {
        $this->validate($request, [
            'nomor_surat_id'=> 'required',
            'lampiran'=> 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'isi_pembuka' => 'required|max:1555',
            'isi_penutup' => 'required|max:1555',
        ],
        [
            'nomor_surat_id.required'=>'Jenis surat harus diisi',
            'lampiran.required'=>'Lampiran harus diisi',
            'perihal.required'=>'Perihal harus diisi',
            'kepada.required'=>'Kepada harus diisi',
            'isi_pembuka.required'=>'Isi Pembuka harus diisi',
            'isi_penutup.required'=>'Isi Penutup harus diisi',
            'isi_pembuka.max'=>'Text tidak boleh melebihi 1555 kata',
            'isi_penutup.max'=>'Text tidak boleh melebihi 1555 kata',
        ]
        );

        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];

        $surat=BuatSurat::find($id);
        $surat->nomor_surat_id=$request->nomor_surat_id;
        
        if ($surat->id < 10) {
            $noid = "0".$surat->id;
        } else {
            $noid = $surat->id;
        }
        $kode = $noid;

        if($surat->nomor_surat_id < 10) {
            $kodesurat = $kode.".0".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');
        }else {
            $kodesurat = $kode.".".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');
        }
        $surat->no_surat=$kodesurat;   

        $surat->tubuh_surat_id = $request->tubuh_surat_id;
        $surat->lampiran=$request->lampiran;
        $surat->perihal=$request->perihal;
        $surat->kepada=$request->kepada;
        $surat->isi_pembuka=$request->isi_pembuka;   
        $surat->isi_penutup=$request->isi_penutup;                  
        $surat->created_at=\Carbon\Carbon::now();
        $surat->save();
        
        return redirect()->route('buat-surat.index')->with('sukses', 'Surat berhasil disimpan');
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
        $surat->nomor_surat_id=$request->nomor_surat_id;
        
        if ($surat->id < 10) {
            $noid = "0".$surat->id;
        } else {
            $noid = $surat->id;
        }
        $kode = $noid;

        if($surat->nomor_surat_id < 10) {
            $kodesurat = $kode.".0".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');
        }else {
            $kodesurat = $kode.".".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');
        }
        $surat->no_surat=$kodesurat;   

        $surat->tubuh_surat_id = $request->tubuh_surat_id;
        $surat->lampiran=$request->lampiran;
        $surat->perihal=$request->perihal;
        $surat->kepada=$request->kepada;
        $surat->isi_pembuka=$request->isi_pembuka;   
        $surat->isi_penutup=$request->isi_penutup;                  
        $surat->created_at=\Carbon\Carbon::now();
        $surat->save();
        
        return redirect()->route('buat-surat.index')->with('sukses', 'Surat berhasil diubah');
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
