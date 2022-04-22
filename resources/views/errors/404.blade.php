<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.app')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.navigation')

        @include('layouts.notfound')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-4">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">404 | Halaman tidak ditemukan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">404 | Halaman tidak ditemukan</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content mt-4 py-5">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="mb-5">Halaman Tidak Ditemukan</p>
                        <p class="mb-0">Sepertinya halaman yang anda kunjungi tidak ditemukan...</p>
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