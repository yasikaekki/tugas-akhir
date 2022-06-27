<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.top')
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
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$judul}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Beranda</a></li>
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
                        @empty($data)
                        <div class="col-lg-7">
                            <div class="card mt-5 p-5">
                              <div class="card-body p-4">
                                <div class="text-center mb-4">
                                  <h1 class="display-4 text-warning"><i class="bi bi-emoji-frown"></i></h1>
                                </div>
                                <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada data apapun</p>
                              </div> 
                            </div>
                        </div>
                        @else
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('laporan.index')}}" method="GET">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="filter_sort">
                                                <option disabled hidden selected>Pilih</option>
                                                <option value="1">Terbaru</option>
                                                <option value="2">Terlama</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-sliders"></i> Urutkan</button>
                                        </div>     
                                    </form>

                                    @if($laporan->count() == 0)
                                    <tr class="table-secondary text-center">
                                        <th>No.</th>
                                        <th>Nama Lengkap, Gelar</th>
                                        <th>Jabatan</th>
                                        <th>NIK/NIP/NIPPPK</th>
                                        <th>Nomor Surat</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Buat</th>
                                    </tr>
                                    <h3 class="text-center text-warning fw-bold mt-3">Tidak menemukan data apapun</h3>
                                    @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Surat</th>
                                            <th>Lampiran</th>
                                            <th>Perihal</th>
                                            <th>Isi Pembuka</th>
                                            <th>Isi Penutup</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laporan as $laporans)
                                        <tr class="text-center">
                                            <td>{{$no++}}.</td>
                                            <td>{{$laporans->cetak_surat->buat_surat->no_surat}}</td>
                                            <td>{{$laporans->cetak_surat->buat_surat->nomor_surat->jenis_surat}}</td>  
                                            <td>{{$laporans->cetak_surat->buat_surat->lampiran}}</td>
                                            <td>{{$laporans->cetak_surat->buat_surat->perihal}}</td>  
                                            <td>{{$laporans->cetak_surat->buat_surat->isi_pembuka}}</td>  
                                            <td>{{$laporans->cetak_surat->buat_surat->isi_penutup}}</td>  
                                            <td>{{$laporans->cetak_surat->created_at->translatedFormat('l, d F Y')}}</td>      
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endempty
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