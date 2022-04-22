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
                      @elseif(session()->get('hapus'))
                      <div class="alert alert-danger">
                          {{session()->get('hapus')}}
                      </div>
                      @endif
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
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
                                      <tr class="text-center">
                                          <td>{{$no++}}.</td>
                                          <td>{{$users->name}}</td>
                                          <td>{{$users->email}}</td>
                                          <td>{{$users->email_verified_at}}</td> 
                                          <td>
                                            @if($users->id == 1)
                                            <a href="{{route('anggota.edit',$users->id)}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah</a>
                                            @else
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$no}}"><i class="bi bi-trash3-fill"></i> Hapus</button>
                                            <div class="modal fade" id="staticBackdrop{{$no}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="p-3">
                                                    <div class="d-flex justify-content-center py-4">
                                                      <i class="bi bi-exclamation-triangle text-warning display-1"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                      <h3 class="mb-4">Apakah kamu yakin ingin menghapus akun {{$users->name}}?</h3>
                                                    </div>
                                                    <div class="d-flex justify-content-evenly p-3">
                                                      <button class="btn btn-primary py-3 px-4" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                      <form action="{{route('anggota.destroy', $users->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger py-3 px-4">Hapus</button>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            @endif
                                          </td>                                         
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