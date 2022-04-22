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
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-top-info p-4">                      
                                <div class="card-body">
                                    <div class="form-group text-center mb-3">
                                        <img src="{{ asset('vendor/dist/img/avatar5.png')}}" class="profile-user img-circle">                                        
                                        <h4 class="fs-3">{{$userauth->name}}</h4>
                                        <p class="text18 text-muted mb-4">Pendidikan</p>                                        
                                    </div>
                                    <div class="d-grid col-12 mx-auto">                                  
                                        <div class="card mb-4">
                                            <div class="card-header bg-light">
                                                <p class="text-center h5 fw-bold">Biodata Diri</p>
                                            </div>
                                            <div class="card-body">
                                                <medium class="text-muted">Nama Lengkap:</medium>
                                                <medium class="mb-3">Yasika Ekki Permana</medium>
                                                <hr>
                                                <medium class="text-muted">Tempat / Tanggal Lahir:</medium>
                                                <medium class="mb-3">Banyuwangi, 07 Desember 1999</medium>
                                                <hr>
                                                <medium class="text-muted">Alamat Rumah:</medium>
                                                <medium class="mb-3">Dusun Curah Ketangi Rt/Rw 07/01, Desa Setail, Kec. Genteng, Kab. Banyuwangi</medium>
                                                <hr>
                                                <medium class="text-muted">Jenis Kelamin:</medium>
                                                <medium class="mb-3">Laki - Laki</medium>
                                                <hr>
                                                <medium class="text-muted">Telepon:</medium>
                                                <medium class="mb-3">081238398906</medium>
                                            </div>                                           
                                        </div>
                                        @if($akun->nip == null || $akun->jabatan == null || $akun->gelar == null)
                                        <a href="{{route('profil.edit',$akun->id)}}" class="mt-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Lengkapi Profil</a>
                                        @else
                                        <a href="{{route('profil.edit',$akun->id)}}" class="mt-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah</a>
                                        @endif
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
    @include('layouts.bottom')
</html>