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
        <div class="content-wrapper py-5 mt-2">
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
                      @elseif(session()->get('hapus'))
                      <div class="alert alert-danger">
                          {{session()->get('hapus')}}
                      </div>
                      @endif
                        <div class="col-lg-12">
                            <div class="card p-4">
                                <div class="card-body">
                                  <div class="d-grid d-md-flex justify-content-md-end">
                                    <a href="{{route ('anggota.create')}}" class="btn btn-success mb-3"><i class="bi bi-plus-square-fill"></i> Tambah</a>
                                  </div>              
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr class="table-secondary text-center">
                                        <th>No.</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Verifikasi Email</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($user as $i => $users)
                                      <tr>
                                          <td class="text-center">{{$no++}}.</td>
                                          <td class="text-center">{{$users->name}}</td>
                                          <td class="text-center">{{$users->email}}</td>
                                          <td class="text-center">{{$users->email_verified_at}}</td>                                              
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