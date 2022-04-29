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
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Buat Surat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas bi-file-earmark-text-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Laporan Surat Keluar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas bi-clipboard2-pulse-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rekapitulasi Surat Keluar
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas bi-clipboard2-data-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center mt-2">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-user-group fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Jumlah Surat Keluar Hari Ini</p>
                                    <hr>
                                    @if($laporan->id_no_surat == null || $laporan->nomor_surat == null)
                                    <p class="fw-bold mt-4 fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @else
                                    <p class="fs-2 text-center">{{$jumlahhari}}</p>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Jumlah Surat Keluar Bulan Ini</p>
                                    <hr>
                                    @if($laporan->id_no_surat == null || $laporan->nomor_surat == null)
                                    <p class="fw-bold mt-4 fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @else
                                    <p class="fs-2 text-center">{{$jumlahbulan}}</p>
                                    @endif
                                </div>
                            </div>
                        </section> 
                        <section class="col-lg-4">
                            <div class="card border-top-dark p-4">
                                <div class="card-body">
                                    <p class="h5 mt-2 mb-3 text-center">Jumlah Surat Keluar Tahun Ini</p>
                                    <hr>
                                    @if($laporan->id_no_surat == null || $laporan->nomor_surat == null)
                                    <p class="fw-bold mt-4 fs-5 text-center">Belum ada surat yang dibuat</p>
                                    @else
                                    <p class="fs-2 text-center">{{$jumlahtahun}}</p>
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