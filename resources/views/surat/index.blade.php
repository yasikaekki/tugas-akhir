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
                            <form action="{{route('surat.update', $noid)}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-sm-6">
                                                <label>Nomor Surat</label>
                                                <input type="text" value="{{$surat->no_surat}}" placeholder="Nomor Surat" class="form-control mb-3" disabled>            
                                                
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-3">
                                                    <label>Jenis Surat</label>
                                                    <select class="form-select form-control @error('nomor_surat_id') is-invalid @enderror" id="exampleFormControlSelect2" name="nomor_surat_id">
                                                    <option value="null" selected hidden disabled>Pilih</option>
                                                    @foreach($nomor as $nomors)
                                                        <option value="{{$nomors->id}}">{{$nomors->id}}. {{$nomors->jenis_surat}}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('nomor_surat_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror   
                                                </div>

                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group mb-3">
                                                    <label>Lampiran</label>
                                                    <select class="form-select form-control mb-3 @error('lampiran') is-invalid @enderror" id="exampleFormControlSelect1" name="lampiran">                                                   
                                                        <option value="null" selected hidden disabled>Pilih</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    @error('lampiran')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-3">
                                                    <label>Agenda</label>
                                                    <select class="form-select form-control mb-3 @error('buat_surat_id') is-invalid @enderror" id="exampleFormControlSelect1" name="buat_surat_id">                                                   
                                                        <option value="null" selected hidden disabled>Pilih</option>
                                                        <option value="{{$noid}}">Acara</option>
                                                        <option value="">Tidak Ada Acara</option>
                                                    </select>
                                                    @error('buat_surat_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-3">
                                                    <label>Perihal</label>
                                                    <input name="perihal" value="{{$surat->perihal}}" type="text" placeholder="Perihal" class="mb-3 form-control @error('perihal') is-invalid @enderror">
                                                    @error('perihal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-3">
                                                    <label>Kepada</label>
                                                    <input name="kepada" value="{{$surat->kepada}}" type="text" placeholder="Kepada" class="form-control @error('kepada') is-invalid @enderror">
                                                    @error('kepada')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Isi Surat Pembuka</label>
                                                    <textarea name="isi_pembuka" placeholder="Isi Surat Pembuka" style="height:150px;" class="form-control @error('isi_pembuka') is-invalid @enderror">{{$surat->isi_pembuka}}</textarea>
                                                    @error('isi_pembuka')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <label class="mt-3">Contoh Isi Surat Pembuka</label>
                                                    <textarea style="height:150px;" class="form-control" disabled>{{$pembuka}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Isi Surat Penutup</label>
                                                    <textarea name="isi_penutup" placeholder="Isi Surat Penutup" style="height:150px;" class="form-control @error('isi_penutup') is-invalid @enderror">{{$surat->isi_penutup}}</textarea>
                                                    @error('isi_penutup')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <label class="mt-3">Contoh Isi Surat Penutup</label>
                                                    <textarea style="height:150px;" class="form-control" disabled>{{$penutup}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if($surat)
                                        <button type="submit" class="form-control btn btn-primary"><i class="fas fa-save"></i> Simpan Surat</button>
                                        @else
                                        <button type="submit" class="btn btn-primary form-control"><i class="bi bi-pencil-square"></i> Ubah Surat</button>
                                        @endif
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