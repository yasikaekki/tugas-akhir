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
                        @endif
                        <div class="col-lg-6">
                            <form action="{{route ('pembuka.edit',$pembuka->id)}}" method="post">
                                @csrf
                                <div class="card border-top-info p-4">
                                    <div class="card-body">    
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlSelect1">Lampiran</label>
                                            <select class="form-select form-control mb-3 @error('lampiran') is-invalid @enderror" id="exampleFormControlSelect1" name="lampiran">
                                               {{-- <option value="null" selected hidden disabled>Pilih</option> --}}
                                               {{-- @foreach ($pembuka as $pembukas)
                                                @if($pembukas->lampiran != null)
                                                <option value="{{$pembukas->lampiran}}">{{$pembukas->lampiran}}</option>
                                                @else --}}
                                                <option value="-" selected>-</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                {{-- @endif
                                               @endforeach --}}
                                            </select>
                                            @error('lampiran')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Perihal</label>
                                            <input name="perihal" value="{{$pembuka->perihal}}" type="text" placeholder="Perihal" class="mb-3 form-control @error('perihal') is-invalid @enderror">
                                            @error('perihal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Kepada</label>
                                            <input name="kepada" value="{{$pembuka->kepada}}" type="text" placeholder="Kepada" class="mb-3 form-control @error('perihal') is-invalid @enderror">
                                            @error('kepada')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <p class="fw-bold">Isi Surat Pembuka</p>
                                            <textarea name="isi_surat_pembuka" cols="58" rows="5" placeholder="Isi Surat Pembuka" class="mb-3 form-control @error('isi_surat_pembuka') is-invalid @enderror"></textarea>
                                            @error('isi_surat_pembuka')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-5">
                                            <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                                <a href="{{route('nomor.edit',$nomor)}}" class="col-md-4 btn btn-danger">Kembali</a>
                                                <button class="col-md-4 btn btn-primary" type="submit">Simpan</button>
                                                <a href="{{route('surat.suratpenutup.index')}}" class="col-md-4 btn btn-success">Lanjut</a>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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