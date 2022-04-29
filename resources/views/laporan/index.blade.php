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
                                        @foreach($laporan as $laporans)
                                        <tr class="text-center">
                                            <td>{{$no++}}.</td>
                                            @foreach($user as $users)
                                            <td>{{$users->name}}, {{$users->gelar}}</td>
                                            <th>{{$users->jabatan}}</th>
                                            <th>{{$users->no_nip}}</th>                                           
                                            @endforeach
                                            <th>{{$laporans->nomor_surat}}</th>
                                            @if($laporans->id_no_surat == null)
                                            <th></th>
                                            @else
                                            @foreach($jenissurat as $jenissurats)					 
                                            <th>{{$jenissurats->jenis_surat}}</th>
                                            @endforeach  
                                            @endif                  
                                            <th><a href="" class="btn btn-success">Lihat</a></th>                                          
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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