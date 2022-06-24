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
                        @if(session()->get('sukses'))
                        <div class="alert alert-success">
                            {{session()->get('sukses')}}
                        </div>
                        @endif
                        <div class="col-lg-6">
                            {{-- @if($)
                            <form action="{{route('nomor.store')}}" method="POST">
                                @csrf
                            @else     --}}
                            <form action="{{route('nomor.update', $noid)}}" method="POST">
                                @method('PATCH')
                                @csrf
                            {{-- @endif --}}
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label>Nomor Surat</label>
                                            <input type="text" value="{{$nomor->no_surat}}" placeholder="Nomor Surat" class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlSelect2">Jenis Surat</label>
                                            <select class="form-select form-control @error('nomor_surat_id') is-invalid @enderror" id="exampleFormControlSelect2" name="nomor_surat_id">
                                            @if($nomor->jenis_surat == null)
                                            <option value="null" selected hidden disabled>Pilih</option>
                                            @foreach($laporan as $nomors)
                                                <option value="{{$nomors->id}}">{{$nomors->id}}. {{$nomors->jenis_surat}}</option>
                                            @endforeach
                                            @else
                                            @foreach($laporan as $nomors)
                                                <option value="{{$nomors->id}}">{{$nomors->id}}. {{$nomors->jenis_surat}}</option>
                                            @endforeach
                                            @endif
                                            </select>
                                            @error('nomor_surat_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                                           
                                        </div>   
                                        
                                        <div class="form-group mt-5">
                                            <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                                @if($nomor->nomor_surat_id == null)
                                                <button class="col-md-6 btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                                @else
                                                <button class="col-md-6 btn btn-primary" type="submit"><i class="bi bi-pencil-square"></i> Perbarui</button>
                                                @endif
                                                <a href="{{route('pembuka.index')}}" class="col-md-6 btn btn-success">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
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