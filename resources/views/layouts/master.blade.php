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
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                            <div class="inner">
                                <h3></h3>

                                <p>Buat Surat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag my-2"></i>
                            </div>
                            <a href="#" class="small-box-footer my-5">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><sup style="font-size: 20px"></sup></h3>

                                    <p>Laporan Surat Keluar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars my-2"></i>
                                </div>
                                <a href="{{route('laporan.index')}}" class="small-box-footer my-5">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Rekapitulasi Surat Keluar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph my-2"></i>
                                </div>
                                <a href="{{route('rekapitulasi.index')}}" class="small-box-footer my-5">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3></h3>

                                    <p>Anggota</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add my-2"></i>
                                </div>
                                <a href="{{route ('anggota.index')}}" class="small-box-footer my-5">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->                     
                    </div>
                    <div class="row">
                        <section class="col-lg-6 connectedSortable">
                            <div class="card p-4">
                                <div class="card-body">
                                    <p class="h5 mb-3 text-center">Jumlah Surat Keluar Hari Ini</p>
                                    <hr>
                                    <p class="h1 text-center">15</p>
                                </div>
                            </div>
                        </section>
                        <section class="col-lg-6 connectedSortable">
                            <div class="card p-4">
                                <div class="card-body">
                                    <p class="h5 mb-3 text-center">Jumlah Surat Keluar Tahun Ini</p>
                                    <hr>
                                    <p class="h1 text-center">115</p>
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