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
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    @if($tahun->count() == 0)
                                    <form action="{{route('rekapitulasi.index')}}" method="GET" id="formFilter">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="fitur_filter" data-dependent="state">
                                                <option value="{{$keywoard->id}}" selected>{{$keywoard->list_tahun}}</option>
                                                @foreach ($tahun as $alltahun)
                                                <option value="{{$alltahun->id}}">{{$alltahun->list_tahun}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="submit" form="formFilter">Tampilkan</button>
                                        </div>     
                                    </form> 
                                    <h3 class="fw-bold text-center mb-3">Tahun {{$keywoard->list_tahun}}</h3>   
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Surat Keluar</th>
                                        </tr>
                                    </thead>
                                    </table>
                                    <h3 class="text-center text-warning fw-bold mt-3">Tidak menemukan data apapun</h3>
                                    @else
                                    <form action="{{route('rekapitulasi.index')}}" method="GET" id="formFilter">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="fitur_filter" data-dependent="state">
                                                <option value="" disabled hidden selected>Pilih Tahun</option>
                                                @foreach ($tahun as $alltahun)
                                                <option value="{{$alltahun->id}}">{{$alltahun->list_tahun}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="submit" form="formFilter">Tampilkan</button>
                                        </div>     
                                    </form> 
                                    <h3 class="fw-bold text-center mb-3">Tahun {{date('Y')}}</h3>   
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                        <th>No.</th>
                                        <th>Bulan</th>
                                        <th>Jumlah Surat Keluar</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody class="text-center">
                                        @foreach($listbulan as $rekaps)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$rekaps->nama_bulan}}</td>
                                            @if($rekaps->laporan_surat_id != 0)
                                            <td>{{$rekaps->laporan_surat_id}}</td>
                                            @else
                                            <td>Belum ada surat yang dibuat</td>
                                            @endif                               
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    @endif
                                    
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