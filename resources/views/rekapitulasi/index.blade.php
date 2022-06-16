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
                                        <th>Bulan</th>
                                        <th>Jumlah Surat Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>1.</td>
                                            <td>Januari</td>
                                            @if($rekap1->count('id') != 0)
                                            <td>{{$rekap1->count('id')}}</td>
                                            @else
                                            <td>Belum ada surat yang dibuat</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Februari</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Maret</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>April</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Mei</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Juni</td>
                                            @if($rekap6->count('id') != 0)
                                            <td>{{$rekap6->count('id')}}</td>
                                            @else
                                            <td>Belum ada surat yang dibuat</td>
                                            @endif                                             
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Juli</td>
                                            <td>0</td>                                             
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Agustus</td>
                                            <td>0</td>                                             
                                        </tr>
                                        <tr>
                                            <td>9.</td>
                                            <td>September</td>
                                            <td>0</td>                                             
                                        </tr>
                                        <tr>
                                            <td>10.</td>
                                            <td>Oktober</td>
                                            <td>0</td>                                             
                                        </tr>
                                        <tr>
                                            <td>11.</td>
                                            <td>November</td>
                                            <td>0</td>                                             
                                        </tr>
                                        <tr>
                                            <td>12.</td>
                                            <td>Desember</td>
                                            <td>0</td>                                             
                                        </tr>
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