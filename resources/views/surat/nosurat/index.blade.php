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
                        <div class="col-lg-6">
                            <div class="card p-4">
                                <div class="card-body">    
                                    <div class="form-group mb-3">
                                        <label>Nomor Surat</label>
                                        <input type="text" placeholder="01.01/UPTKIBT/VII/2022" class="mb-3 form-control" disabled>
                                    </div>       
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlSelect1">Jenis Surat</label>
                                        <select class="form-select form-control mb-3 @error('kode_surat') is-invalid @enderror" id="exampleFormControlSelect1" name="kode_surat">
                                           {{-- <option value="null" selected hidden disabled>Pilih</option> --}}
                                           {{-- @foreach ($nomor as $nomors) --}}
                                            {{-- <option value="{{$nomors->id}}">{{$nomors->kode_surat}}</option>  --}}
                                           <option value="">Pemberitahuan</option>
                                           <option value="">Evaluasi</option>
                                           {{-- @endforeach --}}
                                        </select>
                                        @error('kode_surat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-5">
                                        <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                            <button class="col-md-6 btn btn-primary" type="button">Button</button>
                                            <a href="{{route('surat.suratpembuka.index')}}" class="col-md-6 btn btn-primary">Button</a>
                                          </div>
                                    </div>
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