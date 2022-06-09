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
                        <li class="breadcrumb-item"><a href="{{route('nomor.index')}}" class="link">Nomor Surat</a></li>
                        <li class="breadcrumb-item"><a href="{{route('pembuka.index')}}" class="link">Surat Pembuka</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tubuh.index')}}" class="link">Tubuh Surat</a></li>
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
                        <div class="col-lg-6">
                            <div class="card border-top-info p-4">
                                <div class="card-body">    
                                    <div class="form-group mb-3">
                                        <p class="fw-bold">Isi Surat Penutup</p>
                                        <textarea name="" id="" cols="58" rows="5" placeholder="Isi Surat Penutup"></textarea>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                        <a href="{{route('pembuka.index')}}" class="col-md-4 btn btn-danger"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                                        <button class="col-md-4 btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
					                    <a href="{{route('cetak.index')}}" class="col-md-4 btn btn-success"><i class="bi bi-file-earmark-pdf-fill"></i> Lihat Surat</a>
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