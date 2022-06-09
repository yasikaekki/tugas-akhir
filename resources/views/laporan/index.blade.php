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
                        @if($surat->no_surat == null || $surat->nomor_surat_id == null)
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
                                    <form action="" method="GET" id="formFilter">
                                        @csrf
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="year">
                                                <option value="" disabled hidden selected>Pilih Tahun</option>
                                                <?php 
                                                    $year = date('Y');
                                                    $min = $year;
                                                    $max = $year + 8;
                                                    for( $i=$min; $i<=$max; $i++ ) {
                                                        echo '<option value='.$i.'>'.$i.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <button class="btn btn-primary" type="submit" form="formFilter">Tampilkan</button>
                                        </div>     
                                    </form>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nama Lengkap, Gelar</th>
                                            <th>Jabatan</th>
                                            <th>NIK/NIP/NIPPPK</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Surat</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laporan as $users)
                                        {{-- @foreach($laporans as $users) --}}
                                        <tr class="text-center">
                                            <td>{{$no++}}.</td>
                                            <td>{{$users->name}}, {{$users->gelar}}</td>
                                            <td>{{$users->jabatan}}</td>
                                            <td>{{$users->no_nip}}</td>
                                            <td>{{$users->laporan_surat->no_surat}}</td>				 
                                            <td>{{$users->laporan_surat->nomor_surat->jenis_surat}}</td>             
                                            <td><a href="" class="btn btn-success">Lihat</a></td>    
                                        </tr>
                                        {{-- @endforeach                                       --}}
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
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