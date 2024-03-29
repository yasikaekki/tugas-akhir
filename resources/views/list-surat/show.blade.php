<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.top')
  <style>
    table {
    border-width: 3px;
    margin: 0 auto;
    padding: 2px;
}

table img{
    width: 120px;
    height: 120px;
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
    font-family: arial!important;
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
.titik-dua {
    margin-left: 5px;
}
.form-ttd{
    padding-left: 50%;
}

.foto-ttd{
    background-image: url('/assets/stempel/{{$cetak->konfigurasi_surat->logo_stempel}}'),url('/assets/foto ttd/{{$cetak->user->foto_ttd}}');
    background-repeat: no-repeat;
    background-size: 8rem 8rem,6rem 6rem;
    background-position: 22rem 4rem,26rem 5rem;
}

@page {
    size: A4;
    margin: 0;
}
@media print{
    body * {
        visibility: hidden;
    }
    .kerangka, .kerangka * {
        visibility: visible
    }

    .kerangka {
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .foto-ttd{
        -webkit-print-color-adjust: exact;
    }
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.navbar')

        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0">{{$judul}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('list-surat.index')}}" class="link">List Surat Keluar</a></li>
                        <li class="breadcrumb-item active">{{$judul}}</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                
                                <div class="card-body">
                                    <div class="border" >

                                        <div class="kerangka">
                                            <table class="kop">
                                                <tr>
                                                    <td><img src="{{asset('vendor/dist/img/poliwangi.png')}}" class="mb-5"></td>
                                                    <td class="garis">
                                                        <p style="line-height: 25px; margin-bottom:10px;margin-left:4rem; margin-right:4rem;">{!!$cetak->konfigurasi_surat->kementerian!!}</p>
                                                        <p style="line-height: 25px; margin-right:4rem; margin-left:4rem;">{!!$cetak->konfigurasi_surat->nama_upt!!}</p>
                                                        <p style="line-height: 10px;">{!!$cetak->konfigurasi_surat->alamat_email_laman!!}</p>
                                                    </td>
                                                    <td><img src="/assets/logo upt/{{$cetak->konfigurasi_surat->logo_upt}}" class="mb-5"></td>
                                                </tr>
                                            </table>
                                    
                                            <table width="75%" class="mt-3">
                                                <tr>
                                                    <td class="text-end text-right fs-6">Banyuwangi, {{$cetak->created_at->translatedFormat('d F Y')}}</td>
                                                </tr>
                                            </table>
                                            <table width="75%" class="mt-3" style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;">
                                                <tr>
                                                    <td>Nomor</td>
                                                    <td width="86%">: {{$cetak->no_surat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Lampiran</td>
                                                    <td width="86%">: {{$cetak->lampiran}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hal</td>
                                                    <td width="86%">: {{$cetak->perihal}}</td>
                                                </tr>
                                            </table>
                                            <table class="mt-3" width="75%">
                                                <tr>
                                                   <td>
                                                       <p style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;">Kpd yth.<br>{{$cetak->kepada}}<br>di Tempat</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            <table class="mt-3" width="75%">
                                                <tr>
                                                    <td>
                                                        <p class="mb-1" style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;">Dengan hormat,</p>
                                                        <p style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;text-align: justify;">&emsp;&ensp;&emsp;&ensp;{{$cetak->isi_pembuka}}</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            @if($cetak->tubuh_surat_id != null)
                                            <table width="65%" class="mt-3" style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;margin-left:19%;">
                                                <tr>
                                                    <td width="20%">Hari, Tanggal</td>
                                                    <td width="86%">: {{strftime("%A, %d %B %Y", strtotime($cetak->tubuh_surat->tanggal))}}</td>
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
                                            <table width="75%" class="mt-4">
                                                <tr>
                                                    <td>
                                                        <p style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;text-align: justify;">&emsp;&ensp;&emsp;&ensp;{{$cetak->isi_penutup}}</p>
                                                    </td>
                                                 </tr>
                                            </table>
                                            @else
                                            <table width="75%">
                                                <tr>
                                                    <td>
                                                        <p style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;text-align: justify;">&emsp;&ensp;&emsp;&ensp;{{$cetak->isi_penutup}}</p>
                                                    </td>
                                                 </tr>
                                            </table>
                                            @endif
                                    
                                            <table width="75%" class="mt-5 foto-ttd" style="font-size:{{$cetak->konfigurasi_surat->size_font_surat}}px;">
                                                <tr>
                                                    <td><p class="form-ttd" style="margin-bottom: 3rem;">Hormat kami,<br>Ketua UPT Kewirausahaan dan Inkubator Bisnis Teknologi Poliwangi</p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class="form-ttd" style="margin-top: 3rem;">{{$cetak->user->name}}, {{$cetak->user->gelar}}<br>{{$cetak->user->nip}}.{{$cetak->user->no_nip}}</p></td>
                                                </tr>
                                            </table> 
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 d-grid gap-2 d-md-flex mx-auto">
                                        <a href="{{route('list-surat.index')}}" class="btn btn-danger"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                                        <button onclick="window.print()" class="btn btn-primary col-md-3"><i class="fas fa-print"></i> Cetak</button>
                                    </div>

                                </div>
                            </div>                      
                        </div>
                    </div>
                    <!-- /.row -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')
    </div>
</body>
    @include('layouts.bottom')
</html>