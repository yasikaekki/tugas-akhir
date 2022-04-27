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
          <!-- /.row -->
          <!-- table -->
          <div class="row d-flex justify-content-center">            
            <div class="col-lg-6">
                <div class="card border-top-info p-4">
                  <div class="card-body">
                      <form action="{{route('anggota.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-3">
                            <label>Email</label>
                            <input name="email" type="email" placeholder="Email" class="mb-3 form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group mb-3">
                            <label>Jabatan</label>
                            <select name="jabatan" id="select" class="form-select mb-3 form-control @error('jabatan') is-invalid @enderror">
                                <option value="null" selected hidden disabled>Pilih</option>
                                <option value="Ketua Umum">Ketua Umum</option>
                                <option value="Sekretaris">Sekretaris</option>
                            </select>
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="aktif" id="select" class="form-select mb-3 form-control @error('aktif') is-invalid @enderror">
                                <option value="null" selected hidden disabled>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('aktif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="form-group mb-3">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="Password" class="mb-3 form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input name="password_konfirmasi" type="password" placeholder="Konfirmasi Password" class="mb-3 form-control @error('password_konfirmasi') is-invalid @enderror">
                            @error('password_konfirmasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <button type="submit" class="btn btn-primary form-control mt-2">Buat akun</button>
                      </form>
                  </div>
              </div>
            </div>
          </div>
          <!-- .table -->
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