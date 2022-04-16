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
                        @if(session()->get('sukses'))
                        <div class="alert alert-success">
                            {{session()->get('sukses')}}
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <form action="{{route('konfigurasi.update', $authuser->id)}}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="card p-4">
                                    <div class="card-body box-profile">
                                        <div class="form-group mb-3">
                                            <img class="profile-user img-circle @error('ubah_foto') is-invalid @enderror" src="{{asset('vendor/user.png')}}" name="ubah_foto">
                                            @error('ubah_foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Nama UPT</label>
                                            <input type="text" name="nama_upt" value="{{$kop->nama_upt}}" placeholder="Nama UPT" class="mb-3 form-control @error('nama_lengkap') is-invalid @enderror">
                                            @error('nama_upt')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Nama Kementrian</label>
                                            <input type="text" value="{{$kop->nama_mentri}}" name="nama_mentri" placeholder="Nama Kementrian" class="mb-3 form-control @error('nama_mentri') is-invalid @enderror">
                                            @error('nama_mentri')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        {{-- @if($kop->nama_upt == null || $kop->nama_mentri == null) --}}
                                        <button type="submit" class="btn btn-primary form-control mt-2">Simpan</button>
                                        {{-- @else
                                        <button type="submit" class="btn btn-primary form-control mt-2">Perbarui</button>
                                        @endif --}}
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
    @include('layouts.bottom')
</html>