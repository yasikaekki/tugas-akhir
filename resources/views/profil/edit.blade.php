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
                            <div class="card p-4">
                                <div class="card-body">
                                    <form action="{{route('profil.update',$akun->id)}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <div class="mb-3 form-group">
                                            <div class="row">
                                                <div class="col-md-5">

                                                    {{-- @if($akun->ubah_foto == null) --}}
                                                    <img class="logo-profil img-circle" id="logo-image" src="{{asset('vendor/user.png')}}">
                                                    {{-- @else
                                                    <img src="{{asset ('images/'.$akun->ubah_foto)}}" id="logo-image" class="mb-4 img-responsive logo-profile-user img-circle" alt="Logo">
                                                    @endif --}}

                                                    <label>Ubah Foto</label>
                                                    <input type="file" accept="image/png, image/jpeg" name="upload_foto" class="form-control @error('upload_foto') is-invalid @enderror">
                                                    {{-- <input value="{{asset ('images/'.$akun->ubah_foto)}}" type="file" accept="image/png, image/jpeg" name="upload_foto" id="preview" class="form-control @error('upload_foto') is-invalid @enderror"> --}}
                                                    @error('upload_foto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
        
                                                <div class="col-md-7">
                                                    <!-- 1@foreach($akuncompany as $perusahaan) -->
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input name="nama_lengkap" type="name" class="mb-3 form-control @error('nama_lengkap') is-invalid @enderror" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Nama Lengkap" value="{{$userauth->name}}">
                                                        @error('nama_lengkap')
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

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label>Tempat, Tanggal Lahir</label>
                                                            <div class="col-md-6">
                                                                <input type="text"  value="{{$akun->tempat_lahir}}" class="mb-3 form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                @error('tempat_lahir')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="date" value="{{$akun->tanggal_lahir}}" class="mb-3 form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                                                @error('tanggal_lahir')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pekerjaan</label>
                                                        <input name="pekerjaan" placeholder="Pekerjaan" class="mb-3 form-control @error('pekerjaan') is-invalid @enderror" value="{{$akun->pekerjaan}}">
                                                        @error('pekerjaan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="select" class="form-select form-control @error('jenis_kelamin') is-invalid @enderror mb-3" required autocomplete="jenis_kelamin">
                                                            @if($akun->jenis_kelamin == null)
                                                            <option value="null" selected hidden disabled>Pilih</option>
                                                            <option value="laki-laki">Laki-laki</option>
                                                            <option value="perempuan">Perempuan</option>
                                                            @else
                                                            <option value="laki-laki">Laki-laki</option>
                                                            <option value="perempuan">Perempuan</option>
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
                                                    
                                                    <div class="form-group">
                                                        <label>Alamat Rumah</label>
                                                        <input type="text" value="{{$akun->alamat_rumah}}" class="mb-3 form-control @error('alamat_rumah') is-invalid @enderror" placeholder="Alamat Rumah" name="alamat_rumah">
                                                        @error('alamat_rumah')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary form-control">Simpan</button>
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