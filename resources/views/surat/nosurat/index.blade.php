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
                        <div class="col-lg-8">
                            {{-- @if($)
                            <form action="{{route('nomor.store')}}" method="POST">
                                @csrf
                            @else     --}}
                            <form action="{{route('nomor.update', $noid)}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-sm-3">
                                                <label>Nomor Surat</label>
                                                <label class="mt-4-5">Jenis Surat</label><br>
                                                <label class="mt-4-5">Perihal</label><br>
                                                <label class="mt-4-5">Lampiran</label><br>
                                                <label class="mt-3-5">Kepada</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" value="{{$nomor->no_surat}}" placeholder="Nomor Surat" class="form-control mb-3" disabled>
                                                <div class="form-group mb-3">
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
                                                <div class="form-group mb-3">
                                                    <input name="perihal" value="" type="text" placeholder="Perihal" class="mb-3 form-control @error('perihal') is-invalid @enderror">
                                                    @error('perihal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    
                                                    <select class="form-select form-control mb-3 @error('lampiran') is-invalid @enderror" id="exampleFormControlSelect1" name="lampiran">
                                                       {{-- <option value="null" selected hidden disabled>Pilih</option> --}}
                                                       {{-- @foreach ($nomor as $nomors) --}}
                                                        {{-- <option value="{{$nomors->id}}">{{$nomors->kode_surat}}</option>  --}}
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                       {{-- @endforeach --}}
                                                    </select>
                                                    @error('lampiran')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    
                                                    <input name="kepada" value="" type="text" placeholder="Kepada" class="mb-3 form-control @error('kepada') is-invalid @enderror">
                                                    @error('kepada')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mt-2">
                                                    <label>Isi Surat Pembuka</label>
                                                    <input name="isi_surat_pembuka" placeholder="Isi Surat Pembuka" class="mb-3 form-control @error('isi_surat_pembuka') is-invalid @enderror" value="">
                                                    @error('isi_surat_pembuka')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mt-2">
                                                    <label>Isi Surat Pembuka</label>
                                                    <input name="isi_surat_pembuka" placeholder="Isi Surat Pembuka" class="mb-3 form-control @error('isi_surat_pembuka') is-invalid @enderror" value="">
                                                    @error('isi_surat_pembuka')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Cetak Surat</button>
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