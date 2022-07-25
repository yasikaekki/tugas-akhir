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
                        <li class="breadcrumb-item"><a href="{{route('profil.index')}}" class="link">Akun</a></li>
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
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('profil.update',$akun->id)}}" method="post" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="mb-3 form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    @if($akun->gambar_profil == null)
                                                    <img class="logo-profil img-circle" src="{{ asset('vendor/dist/img/logo.png')}}" id="logo-image">
                                                    @else
                                                    <img src="/assets/foto profil/{{$akun->gambar_profil}}" class="mb-4 logo-profil img-circle" id="logo-image">
                                                    @endif
                                                    <div class="form-group">
                                                        <label>Ubah Foto</label>
                                                        <input type="file" accept="image/png, image/jpeg" name="gambar_profil" class="form-control @error('gambar_profil') is-invalid @enderror" onchange="previewProfil(event)">
                                                        @error('gambar_profil')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <div></div>
                                                    </div>

                                                    <script>
                                                        var previewProfil = function(event) {
                                                            var fotoProfil = document.getElementById('logo-image');
                                                            fotoProfil.src = URL.createObjectURL(event.target.files[0]);
                                                            fotoProfil.onload = function() {
                                                                URL.revokeObjectURL(fotoProfil.src) 
                                                            }
                                                        };

                                                        var previewTTD = function(event) {
                                                            var fotoTTD = document.getElementById('logo-ttd');
                                                            fotoTTD.src = URL.createObjectURL(event.target.files[0]);
                                                            fotoTTD.onload = function() {
                                                                URL.revokeObjectURL(fotoTTD.src) 
                                                            }
                                                        }
                                                    </script>
                                                </div>
        
                                                <div class="col-md-7">
                                                    @if($akun->gambar_ttd == null)
                                                    <img class="logo-ttd" id="logo-ttd" src="{{ asset('vendor/dist/img/logo.png')}}">
                                                    @else
                                                    <img class="logo-ttd" id="logo-ttd" src="/assets/foto ttd/{{$akun->gambar_ttd}}">
                                                    @endif
                                                    <div class="form-group">
                                                        <label>Ubah TTD</label>
                                                        <input type="file" accept="image/png, image/jpeg" name="gambar_ttd" class="form-control @error('gambar_ttd') is-invalid @enderror" onchange="previewTTD(event)">
                                                        @error('gambar_ttd')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Nama Lengkap, Gelar</label>
                                                            <div class="col-md-6">
                                                                <input type="text" value="{{$akun->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" placeholder="Gelar" value="{{$akun->gelar}}" class="form-control @error('gelar') is-invalid @enderror" name="gelar">
                                                                @error('gelar')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <h6 class="font-italic mt-2"><strong>*nb:</strong> Gunakan singkatan pada gelar, contoh :<strong class="font-italic"> S.Kom., M.Kom.</strong></h6>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Tempat, Tanggal Lahir</label>
                                                            <div class="col-md-6">
                                                                <input type="text" value="{{$akun->tempat_lahir}}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                @error('tempat_lahir')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="date" value="{{$akun->tanggal_lahir}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                                                @error('tanggal_lahir')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="select" class="form-select mb-3 form-control @error('jenis_kelamin') is-invalid @enderror" required autocomplete="jenis_kelamin">
                                                            @if($akun->jenis_kelamin == null)
                                                            <option value="null" selected hidden disabled>Pilih</option>
                                                            <option value="Laki-Laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            @elseif($akun->jenis_kelamin == "Laki-Laki")
                                                            <option value="{{$akun->jenis_kelamin}}" selected>{{$akun->jenis_kelamin}}</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            @elseif($akun->jenis_kelamin == "Perempuan")
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="{{$akun->jenis_kelamin}}" selected>{{$akun->jenis_kelamin}}</option>
                                                            @endif
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" value="{{$akun->telepon}}" class="mb-3 form-control @error('telepon') is-invalid @enderror" placeholder="Telepon" name="telepon">
                                                        @error('telepon')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    @if($akun->tempat_lahir == null || $akun->tanggal_lahir == null || $akun->jenis_kelamin == null || $akun->telepon == null)                                                
                                                    <button type="submit" class="btn btn-primary form-control mt-3"><i class="fas fa-save"></i> Simpan</button>
                                                    @else
                                                    <button type="submit" class="btn btn-primary form-control mt-3"><i class="bi bi-pencil-square"></i> Perbarui</button>
                                                    @endif
                                                </div>        
                                            </div>
                                        </div>
                                    </form>
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