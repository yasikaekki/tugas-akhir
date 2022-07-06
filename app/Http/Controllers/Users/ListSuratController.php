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
use App\NomorSurat;
use App\User;
use App\Bulan;
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
        $bulan = Bulan::all();
        $judul = "List Surat Keluar";
        $no = 1;
        $laporan = LaporanSurat::paginate(6);
        $surat = count($laporan);
        $data= LaporanSurat::find($surat);
        $nomor = NomorSurat::all();

        // if ($request->fitur_cari) {
        //     $laporan = DB::table('buat_surats')
        //     ->where('kepada','like','%'.$request->fitur_cari.'%')
        //     ->orderBy('created_at','desc')
        //     ->paginate(6);
        // }
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
        $laporans = BuatSurat::find($data);

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
        $romawi	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
	    $bulan = $romawi[date('n')];
        $array= array(2022=>1,2,3,4,5,6,7,8,9);
        $tahun = $array[date('Y')];

        $surat = BuatSurat::find($id);

        $nomor=NomorSurat::find($surat->nomor_surat_id); //hasil request pertama pada table nomor surat field cetak surat id
        if ($request->nomor_surat_id) {
            if ($tahun == 1) {
                $nomor->tahun_satu = $nomor->tahun_satu-1;
            }elseif ($tahun == 2) {
                $nomor->tahun_dua = $nomor->tahun_dua-1;
            }elseif ($tahun == 3) {
                $nomor->tahun_tiga = $nomor->tahun_tiga-1;
            }elseif ($tahun == 4) {
                $nomor->tahun_empat = $nomor->tahun_empat-1;
            }elseif ($tahun == 5) {
                $nomor->tahun_lima = $nomor->tahun_lima-1;
            }elseif ($tahun == 6) {
                $nomor->tahun_enam = $nomor->tahun_enam-1;
            }elseif ($tahun == 7) {
                $nomor->tahun_tujuh = $nomor->tahun_tujuh-1;
            }elseif ($tahun == 8) {
                $nomor->tahun_delapan = $nomor->tahun_delapan-1;
            }elseif ($tahun == 9) {
                $nomor->tahun_sembilan = $nomor->tahun_sembilan-1;
            }
            $nomor->save();
        }

        $surat->nomor_surat_id=$request->nomor_surat_id;
        $kodesurat = $surat->id.".".$surat->nomor_surat_id."/PL36/UPTKIBT/".$bulan."/".date('Y');      
        $surat->no_surat=$kodesurat;
        $surat->lampiran=$request->lampiran;
        $surat->perihal=$request->perihal;
        $surat->kepada=$request->kepada;
        $surat->isi_pembuka=$request->isi_pembuka;   
        $surat->isi_penutup=$request->isi_penutup;                  
        $surat->created_at=\Carbon\Carbon::now();
        $surat->save();

        $newnomor=NomorSurat::find($surat->nomor_surat_id); //hasil request terbaru pada table nomor surat field cetak surat id
        if ($tahun == 1) {
            if ($newnomor->tahun_satu == null) {
                # code...
                $newnomor->tahun_satu = 1;
            } else {
                # code...
                $newnomor->tahun_satu = $newnomor->tahun_satu+1;
            }
        }elseif ($tahun == 2) {
            if ($newnomor->tahun_dua == null) {
                # code...
                $newnomor->tahun_dua = 1;
            } else {
                # code...
                $newnomor->tahun_dua = $newnomor->tahun_dua+1;
            }
        }elseif ($tahun == 3) {
            if ($newnomor->tahun_tiga == null) {
                # code...
                $newnomor->tahun_tiga = 1;
            } else {
                # code...
                $newnomor->tahun_tiga = $newnomor->tahun_tiga+1;
            }
        }elseif ($tahun == 4) {
            if ($newnomor->tahun_empat == null) {
                # code...
                $newnomor->tahun_empat = 1;
            } else {
                # code...
                $newnomor->tahun_empat = $newnomor->tahun_empat+1;
            }
        }elseif ($tahun == 5) {
            if ($newnomor->tahun_lima == null) {
                # code...
                $newnomor->tahun_lima = 1;
            } else {
                # code...
                $newnomor->tahun_lima = $newnomor->tahun_lima+1;
            }
        }elseif ($tahun == 6) {
            if ($newnomor->tahun_enam == null) {
                # code...
                $newnomor->tahun_enam = 1;
            } else {
                # code...
                $newnomor->tahun_enam = $newnomor->tahun_enam+1;
            }
        }elseif ($tahun == 7) {
            if ($newnomor->tahun_tujuh == null) {
                # code...
                $newnomor->tahun_tujuh = 1;
            } else {
                # code...
                $newnomor->tahun_tujuh = $newnomor->tahun_tujuh+1;
            }
        }elseif ($tahun == 8) {
            if ($newnomor->tahun_delapan == null) {
                # code...
                $newnomor->tahun_delapan = 1;
            } else {
                # code...
                $newnomor->tahun_delapan = $newnomor->tahun_delapan+1;
            }
        }elseif ($tahun == 9) {
            if ($newnomor->tahun_sembilan == null) {
                # code...
                $newnomor->tahun_sembilan = 1;
            } else {
                # code...
                $newnomor->tahun_sembilan = $newnomor->tahun_sembilan+1;
            }
        }
        $newnomor->save();
        
        $agenda = TubuhSurat::find($id); 
        $agenda->buat_surat_id = $nomor->id;
        $agenda->tanggal = $request->tanggal;
        $agenda->acara = $request->acara;
        $agenda->jam = $request->jam;
        $agenda->tempat = $request->tempat;
        $agenda->save();

        $cetak = CetakSurat::find($id);
        $cetak->tubuh_surat_id = $request->tubuh_surat_id;
        $cetak->save();

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
