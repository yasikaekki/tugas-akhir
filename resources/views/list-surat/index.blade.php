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
                        @empty($data)
                        <div class="col-lg-7">
                            <div class="card mt-5 p-5">
                              <div class="card-body p-4">
                                <div class="text-center mb-4">
                                  <h1 class="display-4 text-warning"><i class="bi bi-emoji-frown"></i></h1>
                                </div>
                                <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada data apapun</p>
                              </div> 
                            </div>
                        </div>
                        @else
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('list-surat.index')}}" method="GET">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="filter_tahun">
                                                <option disabled hidden selected>Pilih Tahun</option>
                                                @foreach($tahun as $alltahun)
                                                <option value="{{$alltahun->list_tahun}}">{{$alltahun->list_tahun}}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-select col-md-2" name="filter_bulan">
                                                <option disabled hidden selected>Pilih Bulan</option>
                                                @foreach($bulan as $allbulan)
                                                @if($allbulan->id < 10)
                                                <option value="0{{$allbulan->id}}">{{$allbulan->nama_bulan}}</option>
                                                @else
                                                <option value="{{$allbulan->id}}">{{$allbulan->nama_bulan}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <select class="form-select col-md-2" name="filter_sort">
                                                <option disabled hidden selected>Urutkan Menurut</option>
                                                <option value="desc">Terbaru</option>
                                                <option value="asc">Terlama</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-sliders"></i> Urutkan</button>
                                        </div>     
                                    </form>
                                    
                                    @if($laporan->count() == null) 
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal</th>
                                            <th>Pembuat</th>
                                            <th>Penerima</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    </table>
                                    <h3 class="text-center text-warning fw-bold mt-3">Tidak menemukan data apapun</h3>
                                    @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Isi Ringkasan</th>
                                            <th>Mengetahui</th>
                                            <th>Kepada</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laporan as $laporans)
                                        <tr class="text-center">
                                            <td>{{$no++}}.</td>
                                            <td>{{$laporans->buat_surat->no_surat}}</td>
                                            <td>{{$laporans->buat_surat->perihal}}</td>
                                            <td>{{$laporans->buat_surat->user->name}}, {{$laporans->buat_surat->user->gelar}} Selaku Ketua UPT KIBT Poliwangi</td> 
                                            <td>{{$laporans->buat_surat->kepada}}</td>
                                            <td>{{$laporans->buat_surat->created_at->translatedFormat('l, d F Y')}}</td>  
                                            <td>
                                                <a href="{{route('list-surat.show', Crypt::encrypt($laporans->buat_surat->id))}}" class="btn btn-success"><i class="bi bi-envelope-open-fill"></i> Lihat</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    @if($laporan->count() != null)
                                    {{$laporan->links('layouts.pagination')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endempty
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