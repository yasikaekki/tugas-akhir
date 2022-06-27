<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print PDF</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style type="text/css">
    body{
        font-family: arial!important;
        background-color: #ccc;
    }

    table {
        border-width: 3px;
        margin: 0 auto;
        padding: 2px;
    }

    table img{
        width: 90px;
        height: 90px;
    }

    .border {
        border: 3px solid #000!important;
        margin: 0 auto;
        height: auto;
        width: auto;
    }

    .kop {
        border-bottom: 5px solid #000;
        margin: 0 auto;
        margin-right: 4rem;
        margin-left: 4rem;
    }

    .kerangka{
        width: auto;
        margin: 0 auto;
        background-color: #fff;
        height: auto;
        padding: 10px;
    }

    .garis{
        text-align: center;
        line-height: 5px;
    }
    .fs-7 {
        font-size: 10px;
    }
    .titik-dua {
        margin-left: 5px;
    }

    .form-ttd{
        padding-left: 65%;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print{

        html, body {
            width: 210mm;
            height: 297mm;
        }

        .kerangka {
            position: absolute;
            top: 0px;
            left: 0px;
        }
    }
  </style>
</head>
<body>
    <section class="container py-4">
        <div class="row d-flex justify-content-center">
            <div class="kerangka" id="kerangka">
                <table class="kop">
                    <tr>
                        @if($cetak->konfigurasi_kop_surat->lokasi_foto == null)
                        <td><img src="{{asset('vendor/dist/img/upt.png')}}" class="mb-5"></td>
                        @else
                        <td><img src="/assets/logo upt/{{$cetak->konfigurasi_kop_surat->lokasi_foto}}" class="mb-5"></td>
                        @endif
                        <td class="garis">
                            <p class="fs-5" style="line-height: 25px; margin-bottom:10px;margin-left:2rem; margin-right:2rem;">{{$kop1}}</p>
                            <p class="fs-5 mb-2">{{$kop2}}</p>
                            @if($kop4->nama_upt == null)
                            <p class="fw-bold fs-5 mb-1" style="line-height: 25px; margin-right:1rem; margin-left:1rem;">{{$kop3}}</p>
                            @else
                            <p class="fw-bold fs-5 mb-1" style="line-height: 25px; margin-right:1rem; margin-left:1rem;">{{$kop4->nama_upt}}</p>
                            @endif
                            <p class="fs-7" style="line-height: 10px;">{{$kop5}}</p>
                            <p class="fs-7">{{$kop6}}</p>
                        </td>
                        <td><img src="{{asset('vendor/dist/img/poliwangi.png')}}" class="mb-5"></td>
                    </tr>
                </table>
        
                <table width="65%">
                    <tr>
                        <td class="text-end text-right fs-6">Banyuwangi, {{$cetak->buat_surat->created_at->translatedFormat('d F Y')}}</td>
                    </tr>
                </table>
                
                <table width="65%">
                    <tr>
                        <td>Nomor</td>
                        <td width="86%">: {{$cetak->buat_surat->no_surat}}</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td width="86%">: {{$cetak->buat_surat->lampiran}}</td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td width="86%">: {{$cetak->buat_surat->perihal}}</td>
                    </tr>
                </table>
        
                <table class="mt-4" width="65%">
                    <tr>
                       <td>
                           <p class="fs-6">Kpd yth.<br>{{$cetak->buat_surat->kepada}}<br>di Tempat</p>
                       </td>
                    </tr>
                </table>
        
                <table class="mt-3" width="65%">
                    <tr>
                        <td>
                            <p class="fs-6 mb-1">Dengan hormat,</p>
                            <p class="fs-6">{{$cetak->buat_surat->isi_pembuka}}</p>
                        </td>
                    </tr>
                </table>
                @if($cetak->tubuh_surat_id != null)
                <table width="55%" class="mb-2">
                    <tr>
                        <td width="20%">Hari, Tanggal</td>
                        <td width="86%">: {{$cetak->tubuh_surat->tanggal}}</td>
                    </tr>
                    <tr>
                    <tr>
                        <td width="20%">Jam</td>
                        <td width="86%">: {{$cetak->tubuh_surat->jam}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Acara</td>
                        <td width="86%">: {{$cetak->tubuh_surat->acara}}</td>
                    </tr>
                    <tr>
                        <td width="20%">Tempat</td>
                        <td width="86%">: {{$cetak->tubuh_surat->tempat}}</td>
                    </tr>
                    
                </table>
                @endif
        
                <table width="65%" class="mb-5">
                    <tr>
                        <td>
                            <p class="mb-2 fs-6">{{$cetak->buat_surat->isi_penutup}}</p>
                        </td>
                     </tr>
                </table>
        
                <table width="65%" class="mt-5">
                    <tr>
                        <td><p class="form-ttd text-start mb-5">Hormat kami,<br>Ketua UPT Kewirausahaan dan<br>Inkubator Bisnis Teknologi Poliwangi</p></td>
                    </tr>
                    <tr>
                        <td><p class="form-ttd text-start mt-5">{{$cetak->user->name}}, {{$cetak->user->gelar}}<br>{{$cetak->user->nip}}.{{$cetak->user->no_nip}}</p></td>
                    </tr>
                </table> 
            </div>
        </div>
    </section>
    
</html>