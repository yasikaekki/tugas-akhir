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
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <a href="{{route('surat.index')}}">
                                            <div class="row">
                                                <div class="col mr-2">
                                                    <div class="h5 mt-4 font-weight-bold text-primary text-uppercase mb-1">Buat Surat</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-solid fa-file-pen fa-2x text-dark mt-3"></i>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <a href="{{route('laporan.index')}}">
                                            <div class="row">
                                                <div class="col mr-2">
                                                    <div class="h6 font-weight-bold text-success text-uppercase mt-3 mb-1">
                                                        Laporan Surat Keluar</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas bi-clipboard2-pulse-fill fa-2x text-dark mt-3"></i>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <a href="{{route('rekapitulasi.bulan.index')}}">
                                            <div class="row">
                                                <div class="col mr-2">
                                                    <div class="h6 font-weight-bold text-info text-uppercase mt-3 mb-1">Rekapitulasi Surat Keluar
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas bi-clipboard2-data-fill fa-2x text-dark mt-3"></i>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <a href="{{route('anggota.index')}}">
                                            <div class="row">
                                                <div class="col mr-2">
                                                    <div class="h5 font-weight-bold text-warning text-uppercase mt-4 mb-1"> Anggota</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-solid fa-user-group fa-2x text-dark mt-3"></i>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Surat Keluar Hari Ini</p>
                                    <hr>
                                    @if($hariini->count() != 0)
                                    <p class="fs-5 text-center">{{$hariini->count('nomor_surat_id')}}</p>
                                    @else
                                    <p class="fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Surat Keluar Bulan Ini</p>
                                    <hr>
                                    @if($bulanini->count() != 0)
                                    <p class="fs-5 text-center">{{$bulanini->count('nomor_surat_id')}}</p>
                                    @else
                                    <p class="fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Surat Keluar Tahun Ini</p>
                                    <hr>
                                    @if($tahunini->count() != 0)
                                    <p class="fs-5 text-center">{{$tahunini->count('nomor_surat_id')}}</p>
                                    @else
                                    <p class="fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @endif
                                </div>
                            </div>
                        </section> 
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('layouts.footer')
    </div>
    @include('layouts.bottom')
</body>
</html>