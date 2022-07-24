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
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('buat-surat.index')}}" class="link">Buat Surat</a></li>
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
                        <div class="col-lg-6">
                            {{-- @if($pembuka->lampiran == null || $pembuka->perihal == null || $pembuka->kepada == null || $pembuka->isi_surat_pembuka == null) --}}
                            <form action="{{route('surat-agenda.update', $isi->id)}}" method="POST">
                                @method('PATCH')
                                @csrf
                            {{-- @else
                            <form action="{{route ('pembuka.store')}}" method="post">
                                @csrf
                            @endif --}}
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label>Hari, Tanggal</label>
                                            <input type="date" min="{{date('Y-m-d')}}" value="{{$isi->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal">
                                            @error('tanggal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Jam</label>
                                            <input type="time" name="jam" value="{{$isi->jam}}" class="mb-3 form-control @error('jam') is-invalid @enderror">
                                            @error('jam')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Acara</label>
                                            <input name="acara" value="{{$isi->acara}}" type="text" placeholder="Acara" class="mb-3 form-control @error('acara') is-invalid @enderror">
                                            @error('acara')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Tempat</label>
                                            <input name="tempat" value="{{$isi->tempat}}" type="text" placeholder="Tempat" class="mb-3 form-control @error('tempat') is-invalid @enderror">
                                            @error('tempat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                            <a href="{{route('buat-surat.index')}}" class="col-md-4 btn btn-danger"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                                            @if($isi->tanggal == null || $isi->jam == null || $isi->acara == null || $isi->tempat == null)           
                                            <button class="col-md-4 btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                            @else
                                            <button class="col-md-4 btn btn-primary" type="submit"><i class="bi bi-pencil-square"></i> Perbarui</button>
                                            @endif
                                            <a href="{{route('surat-cetak.index')}}" class="col-md-4 btn btn-warning">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
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