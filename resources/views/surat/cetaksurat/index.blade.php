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
                    <div class="col-sm-4">
                        <h1 class="m-0">{{$judul}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="link">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('nomor.index')}}" class="link">Nomor Surat</a></li>
                        <li class="breadcrumb-item"><a href="{{route('pembuka.index')}}" class="link">Surat Pembuka</a></li>
                        <li class="breadcrumb-item"><a href="{{route('tubuh.index')}}" class="link">Tubuh Surat</a></li>
                        <li class="breadcrumb-item"><a href="{{route('penutup.index')}}" class="link">Surat Penutup</a></li>
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
                            {{-- @if($cetak->kop == null || $cetak->nomor == null || $cetak->pembuka == null || $cetak->tubuh == null || $cetak->penutup == null) --}}
                            <form action="{{route('cetak.update', $kode)}}" method="post">
                                @method('PATCH')
                                @csrf
                            {{-- @else
                            <form action="" method="post">
                                @method('PATCH')
                                @csrf
                            @endif --}}
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <a href="{{route('penutup.index')}}" class="btn btn-danger">Kembali</a>    
                                       @if(!is_null($cetak->konfigurasi_kop_surat && $cetak->laporan_surat && $cetak->laporan_surat && $cetak->laporan_surat))
                                        <button type="submit" class="btn btn-primary">Cetak Surat</button>                             
                                        @else 
                                        <button type="submit" class="btn btn-primary disabled">Cetak Surat</button>
                                        @endif
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