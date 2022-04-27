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
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('profil.update',$akun->id)}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <div class="mb-3 form-group">
                                            <div class="row">
                                                <div class="col-md-5">

                                                    {{-- @if($akun->ubah_foto == null) --}}
                                                    <img class="logo-profil img-circle" id="logo-image" src="{{ asset('vendor/dist/img/avatar5.png')}}">
                                                    {{-- @else
                                                    <img src="{{asset ('images/'.$akun->ubah_foto)}}" id="logo-image" class="mb-4 img-responsive logo-profile-user img-circle" alt="Logo">
                                                    @endif --}}
                                                    <div class="form-group">
                                                        <label>Ubah Foto</label>
                                                        <input type="file" accept="image/png, image/jpeg" name="upload_foto" class="form-control @error('upload_foto') is-invalid @enderror">
                                                        {{-- <input value="{{asset ('images/'.$akun->ubah_foto)}}" type="file" accept="image/png, image/jpeg" name="upload_foto" id="preview" class="form-control @error('upload_foto') is-invalid @enderror"> --}}
                                                        @error('upload_foto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <img class="logo-ttd" id="logo-image" src="{{ asset('vendor/dist/img/default-150x150.png')}}">
                                                    <div class="form-group">
                                                        <label>Ubah Foto</label>
                                                        <input type="file" accept="image/png, image/jpeg" name="upload_foto" class="form-control @error('upload_foto') is-invalid @enderror">
                                                        {{-- <input value="{{asset ('images/'.$akun->ubah_foto)}}" type="file" accept="image/png, image/jpeg" name="upload_foto" id="preview" class="form-control @error('upload_foto') is-invalid @enderror"> --}}
                                                        @error('upload_foto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
        
                                                <div class="col-md-7">
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
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Jabatan" value="{{$akun->jabatan}}">
                                                        @error('jabatan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pendidikan</label>
                                                        <select name="pendidikan_user" id="select" class="form-control mb-3" required autocomplete="pendidikan">                                                       
                                                            @if($akun->pendidikan_user == null)
                                                            <option value="null" selected hidden disabled>Pilih</option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                        </select>
                                                        @error('pendidikan_user')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div> --}}

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
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="select" class="form-select mb-3 form-control @error('jenis_kelamin') is-invalid @enderror" required autocomplete="jenis_kelamin">
                                                            <option value="null" selected hidden disabled>Pilih</option>
                                                            <option value="laki-laki">Laki-laki</option>
                                                            <option value="perempuan">Perempuan</option>
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
                                                    <button type="submit" class="btn btn-primary form-control mt-5">Simpan</button>
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
    @include('layouts.bottom')
</html>