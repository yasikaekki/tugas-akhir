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
                                        <img src="{{ asset('vendor/dist/img/avatar5.png')}}" class="logo-upt img-circle mb-2">                                        
                                        <h4 class="fs-3">{{$akun->name}}, {{$akun->gelar}}</h4>
                                        <p class="fs-5 text-muted mb-4">{{$akun->jabatan}}</p>                                        
                                    </div>
                                    <div class="d-grid col-12 mx-auto">                                  
                                        <div class="card mb-4">
                                            <div class="card-header bg-light">
                                                <p class="text-center h5 fw-bold">Biodata Diri</p>
                                            </div>
                                            <div class="card-body">
                                                <medium class="text-muted">Email:</medium>
                                                <medium class="mb-3">{{$akun->email}}</medium>
                                                <hr>
                                                <medium class="text-muted">NIK/NIP/NIPPPK:</medium>
                                                <medium class="mb-3">{{$akun->nip}}</medium>
                                                <hr>
                                                <medium class="text-muted">Tempat, Tanggal Lahir:</medium>
                                                <medium class="mb-3">{{$akun->tempat}}, {{$akun->tanggal_lahir}}</medium>
                                                <hr>
                                                <medium class="text-muted">Jenis Kelamin:</medium>
                                                <medium class="mb-3">{{$akun->jenis_kelamin}}</medium>
                                                <hr>
                                                <medium class="text-muted">Telepon:</medium>
                                                <medium class="mb-3">{{$akun->jenis_kelamin}}</medium>
                                                <hr>
                                                <medium class="text-muted">Status:</medium>
                                                <medium class="text-primary fw-bold mb-3">{{$akun->status}}</medium>
                                                <hr>
                                                <medium class="text-muted">TTD:</medium>
                                                <medium class="mb-3"><img src="{{asset('vendor/dist/img/default-150x150.png')}}" class="logo-ttd"></medium>
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