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
                        @endif
                        <div class="col-lg-12">
                            <form action="{{route('konfigurasi-surat.update', $konfigurasi->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if ($konfigurasi->logo_upt == null)
                                                <img class="logo-upt" id="logo-kop" src="{{asset('vendor/dist/img/logo.png')}}">
                                                @else
                                                <img class="logo-upt" id="logo-kop" src="{{asset('assets/logo upt/'.$konfigurasi->logo_upt)}}">
                                                @endif
                                                <div class="form-group mb-3">
                                                    <label>Logo UPT</label>
                                                    <input type="file" name="logo_upt" accept="image/png, image/jpeg" class="form-control @error('logo_upt') is-invalid @enderror" onchange="previewKop(event)">
                                                    @error('logo_upt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
    
                                                <script>
                                                    var previewKop = function(event) {
                                                        var logoKop = document.getElementById('logo-kop');
                                                        logoKop.src = URL.createObjectURL(event.target.files[0]);
                                                        logoKop.onload = function() {
                                                            URL.revokeObjectURL(logoKop.src) 
                                                        }
                                                    };

                                                    var previewStempel = function(event) {
                                                        var logoStempel = document.getElementById('logo-stempel');
                                                        logoStempel.src = URL.createObjectURL(event.target.files[0]);
                                                        logoStempel.onload = function() {
                                                            URL.revokeObjectURL(logoStempel.src) 
                                                        }
                                                    };
                                                </script>
                                            </div>
    
                                            <div class="col-md-6">
                                                @if ($konfigurasi->logo_upt == null)
                                                <img class="logo-upt" id="logo-kop" src="{{asset('vendor/dist/img/logo.png')}}">
                                                @else
                                                <img class="logo-upt" id="logo-stempel" src="{{asset('assets/stempel/'.$konfigurasi->logo_stempel)}}">
                                                @endif
                                                <div class="form-group mb-3">
                                                    <label>Stempel</label>
                                                    <input type="file" name="logo_stempel" accept="image/png, image/jpeg" class="form-control @error('logo_stempel') is-invalid @enderror" onchange="previewStempel(event)">
                                                    @error('logo_stempel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Nama UPT</label>
                                            <input type="text" name="nama_upt" value="{{$konfigurasi->nama_upt}}" placeholder="Nama UPT" class="mb-3 form-control @error('nama_lengkap') is-invalid @enderror">
                                            @error('nama_upt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control mt-2"><i class="bi bi-pencil-square"></i> Ubah</button>
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
</body>
    @include('layouts.bottom')
</html>