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
                        <li class="breadcrumb-item"><a href="{{route('anggota-upt-kibt-poliwangi.index')}}" class="link">Anggota</a></li>
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
          <!-- /.row -->
          <!-- table -->
          <div class="row d-flex justify-content-center">            
            <div class="col-lg-6">
                <div class="card border-top-info p-4">
                  <div class="card-body">
                      <form action="{{route('anggota-upt-kibt-poliwangi.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mb-3">
                            <div class="row">
                                <label>Nama Lengkap, Gelar</label>
                                <div class="col-md-6">
                                  <input type="text" name="name" placeholder="Nama Lengkap" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Gelar" value="{{old('gelar')}}" class="form-control @error('gelar') is-invalid @enderror" name="gelar">
                                    @error('gelar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="font-italic mt-2"><strong>*nb:</strong> Gunakan singkatan pada gelar, contoh :<strong class="font-italic"> S.Kom., M.Kom.</strong></h6>
                          </div>

                          <div class="form-group mb-3">
                            <div class="row">
                                <label>NIK/NIP/NIPPPK</label>
                                <div class="col-md-6">
                                  <select name="nip" id="select" class="form-select form-control @error('nip') is-invalid @enderror">
                                    <option value="null" selected hidden disabled>Pilih</option>
                                    <option value="NIK">NIK</option>
                                    <option value="NIP">NIP</option>
                                    <option value="NIPPPK">NIPPPK</option>
                                </select>
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="NIK/NIP/NIPPPK" value="{{old('no_nip')}}" class="form-control @error('no_nip') is-invalid @enderror" name="no_nip">
                                    @error('no_nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                          </div>

                          <div class="form-group mb-3">
                            <label>Jabatan</label>
                            <select name="jabatan" id="select" class="form-select mb-3 form-control @error('jabatan') is-invalid @enderror">
                                <option value="null" selected hidden disabled>Pilih</option>
                                <option value="Ketua Umum">Ketua Umum</option>
                                <option value="Wakil Ketua">Wakil Ketua</option>
                                <option value="Sekretaris I">Sekretaris I</option>
                                <option value="Sekretaris II">Sekretaris II</option>
                                <option value="Bendahara I">Bendahara I</option>
                                <option value="Bendahara II">Bendahara II</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="status" id="select" class="form-select mb-3 form-control @error('status') is-invalid @enderror">
                                <option value="null" selected hidden disabled>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="form-group mb-3">
                            <label>Telepon</label>
                            <input name="telepon" type="text" placeholder="Telepon" class="mb-3 form-control @error('telepon') is-invalid @enderror">
                            @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          
                          <button type="submit" class="btn btn-primary form-control mt-2"><i class="fas fa-save"></i> Buat Akun</button>
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
</body>
@include('layouts.bottom')
</html>