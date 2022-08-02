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
                        @if(session()->get('sukses'))
                        <div class="alert alert-success">
                            {{session()->get('sukses')}}
                        </div>
                        @elseif(session()->get('gagal'))
                        <div class="alert alert-success">
                            {{session()->get('gagal')}}
                        </div>
                        @endif
                        <div class="col-lg-8">
                            <div class="card border-top-info p-4">                      
                                <div class="card-body">
                                    <div class="form-group text-center mb-3">
                                        @if($akun->foto_profil == null)
                                        <img src="{{ asset('vendor/dist/img/logo.png')}}" class="logo-upt img-circle mb-2">   
                                        @else    
                                        <img src="{{asset('assets/foto profil/'.$akun->foto_profil)}}" class="logo-upt img-circle mb-2"> 
                                        @endif                                
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
                                                <medium>{{$akun->email}}</medium>
                                                <hr>
                                                <medium class="text-muted">{{$akun->nip}}:</medium>
                                                <medium class="mb-3">{{$akun->no_nip}}</medium>
                                                <hr>
                                                <medium class="text-muted">Tempat, Tanggal Lahir:</medium>
                                                @if($akun->tempat_lahir != null)
                                                <medium class="mb-3">{{$akun->tempat_lahir}}, {{strftime("%d %B %Y", strtotime($akun->tanggal_lahir))}}</medium>
                                                @endif
                                                <hr>
                                                <medium class="text-muted">Jenis Kelamin:</medium>
                                                <medium class="mb-3">{{$akun->jenis_kelamin}}</medium>
                                                <hr>
                                                <medium class="text-muted">Telepon:</medium>
                                                <medium class="mb-3">{{$akun->telepon}}</medium>
                                                <hr>
                                                <medium class="text-muted">Status:</medium>
                                                <medium class="text-primary fw-bold mb-3">{{$akun->status}}</medium>
                                                <hr>
                                                <medium class="text-muted">TTD:</medium>
                                                @if($akun->foto_ttd == null)
                                                <medium class="mb-3"><img src="{{asset('vendor/dist/img/logo.png')}}" class="logo-ttd"></medium>
                                                @else
                                                <medium class="mb-3"><img src="{{asset('assets/foto ttd/'.$akun->foto_ttd)}}" class="logo-ttd"></medium>
                                                @endif
                                            </div>
                                        </div>
                                        @if($akun->foto_profil == null || $akun->foto_ttd == null || $akun->telepon == null || $akun->tempat_lahir == null || $akun->tanggal_lahir == null)
                                        <a href="{{route('profil.edit', Crypt::encrypt($akun->id))}}" class="mt-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Lengkapi Profil</a>
                                        @else
                                        <a href="{{route('profil.edit', Crypt::encrypt($akun->id))}}" class="mt-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah Profil</a>
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
</body>
    @include('layouts.bottom')
</html>