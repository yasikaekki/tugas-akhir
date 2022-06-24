<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.top')
  <style type="text/css">

    table {
        font-family: arial!important;
        border-width: 3px;
        margin: 0 auto;
        padding: 2px;
    }

    img{
        width: 120px;
        height: 120px;
        padding-top: 20px;
    }

    .kop {
        border-bottom: 5px solid #000;
        margin: 0 auto;
    }

    .kerangka{
        border: 3px solid #000000;
        width: auto;
        margin: 0 auto;
        background-color: #fff;
        height: auto;
        padding: 10px;
    }

    .garis{
        text-align: center;
        line-height: 5px;
        padding-top: 10px;
    }
    .fs-7 {
        font-size: 13px;
    }
    .titik-dua {
        margin-left: 5px;
    }

    .form-ttd{
        padding-left: 65%;
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
                        <h1 class="m-0">Cetak</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('surat.index')}}" class="link">Buat Surat</a></li>
                        <li class="breadcrumb-item active">Cetak</li>
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
                        @if(session()->get('sukses'))
                        <div class="alert alert-success">
                            {{session()->get('sukses')}}
                        </div>
                        @endif
                        <div class="col-lg-12">
                            {{-- @if($cetak->kop == null || $cetak->nomor == null || $cetak->pembuka == null || $cetak->tubuh == null || $cetak->penutup == null) --}}
                            <form action="{{route('surat-cetak.update', $data)}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="kerangka">
                                            <table class="kop">
                                                <tr>
                                                    @if($cetak->konfigurasi_kop_surat->lokasi_foto == null)
                                                    <td><img src="{{asset('vendor/dist/img/upt.png')}}" class="mb-5"></td>
                                                    @else
                                                    <td><img src="/assets/logo upt/{{$cetak->konfigurasi_kop_surat->lokasi_foto}}" class="mb-5"></td>
                                                    @endif
                                                    <td class="garis">
                                                        <p class="fs-5">{{$kop1}}</p>
                                                        <p class="fs-5">{{$kop2}}</p>
                                                        <p class="fs-5">{{$kop3}}</p>
                                                        @if($kop4->nama_upt == null)
                                                        <p class="fw-bold fs-5">UPT KEWIRAUSAHAAN DAN INKUBATOR</p>
                                                        <p class="fw-bold fs-5">BISNIS TEKNOLOGI</p>
                                                        @else
                                                        <p class="fw-bold fs-5">{{$kop4->nama_upt}}</p>
                                                        @endif
                                                        <p class="fs-7">{{$kop5}}</p>
                                                        <p class="fs-7">{{$kop6}}</p>
                                                    </td>
                                                    <td><img src="{{asset('vendor/dist/img/poliwangi.png')}}" class="mb-5"></td>
                                                </tr>
                                            </table>
                                    
                                            <table width="75%">
                                                <tr>
                                                    <td class="text-end text-right fs-6">Banyuwangi, {{$cetak->buat_surat->created_at->translatedFormat('d F Y')}}</td>
                                                </tr>
                                            </table>
                                            
                                            <table width="75%">
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
                                    
                                            <table class="mt-4" width="75%">
                                                <tr>
                                                   <td>
                                                       <p class="fs-6">Kpd yth.<br>{{$cetak->buat_surat->kepada}}<br>di Tempat</p>
                                                   </td>
                                                </tr>
                                            </table>
                                    
                                            <table class="mt-3" width="75%">
                                                <tr>
                                                    <td>
                                                        <p class="fs-6">Dengan hormat,<br>{{$cetak->buat_surat->isi_pembuka}}</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            @if($cetak->tubuh_surat_id != null)
                                            <table width="65%" class="mt-2">
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
                                                    <td width="86%">: {{$cetak->tubuh_surat->tempat}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Tempat</td>
                                                    <td width="86%">: {{$cetak->buat_surat->tempat}}</td>
                                                </tr>
                                                
                                            </table>
                                            @endif
                                    
                                            <table width="75%">
                                                <tr>
                                                    <td>
                                                        <p class="mt-2 fs-6">{{$cetak->buat_surat->isi_penutup}}</p>
                                                    </td>
                                                 </tr>
                                            </table>
                                    
                                            <table width="75%">
                                                <tr>
                                                    <td><p class="form-ttd text-start mb-5">Hormat kami,<br>Ketua UPT Kewirausahaan dan<br>Inkubator Bisnis Teknologi Poliwangi</p></td>
                                                </tr>
                                                <tr>
                                                    <td><p class="form-ttd text-start mt-5">{{$cetak->user->name}}, {{$cetak->user->gelar}}<br>{{$cetak->user->nip}}.{{$cetak->user->no_nip}}</p></td>
                                                </tr>
                                            </table> 
                                        </div>     
                                       @if(!is_null($cetak->konfigurasi_kop_surat && $cetak->laporan_surat && $cetak->laporan_surat && $cetak->laporan_surat))
                                        {{-- <a href="{{route('print')}}" class="btn btn-primary">Cetak Surat</a>   --}}
                                        <button type="submit" class="mt-3 btn btn-primary"><i class="fas fa-print"></i> Cetak Surat</button>                        
                                        @else 
                                        <button type="submit" class="btn btn-primary disabled">Cetak Surat</button>
                                        @endif
                                    </div>
                                </div>
                            </form>                            
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
    @include('layouts.bottom')
</html>