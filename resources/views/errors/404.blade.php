<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.app')
</head>
<body class="bg-light2">
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper p-4">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">404 | Halaman tidak ditemukan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Beranda</a></li>
                    <li class="breadcrumb-item active">404 | Halaman tidak ditemukan</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content my-4 py-5">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="text-center">
                    <div class="error mx-auto">404</div>
                    <p class="mb-5">Halaman Tidak Ditemukan</p>
                    <p class="mb-3">Sepertinya halaman yang anda kunjungi tidak ditemukan...</p>
                    <a href="{{route('home')}}" class="btn btn-primary">
                        <i class="bi bi-house-fill"></i>
                        Beranda
                    </a>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</body>
@include('layouts.bottom')
</html>