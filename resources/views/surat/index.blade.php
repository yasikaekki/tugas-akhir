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
                        @if(Auth::user()->foto_ttd == null || $konfigurasi->logo_upt == null || $konfigurasi->logo_stempel == null || $konfigurasi->nama_upt == null)
                        <div class="col-lg-7">
                            <div class="card mt-4 p-5">
                              <div class="card-body p-4">
                                <div class="text-center mb-4">
                                  <h1 class="display-4 text-warning"><i class="bi bi-emoji-frown"></i></h1>
                                </div>
                                <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum melengkapi profil atau konfigurasi surat</p>
                                <div class="d-grid gap-2 d-md-flex mx-auto justify-content-center">
                                    <a href="{{route('profil.index')}}" class="btn btn-primary"><i class="bi bi-person-fill"></i> Profil</a>
                                    <a href="{{route('konfigurasi-surat.index')}}" class="btn btn-primary"><i class="nav-icon fas fa-solid fa-gear"></i> Kop Surat</a>
                                </div>
                              </div> 
                            </div>
                        </div>
                        @else
                        <div class="col-lg-8">
                            @if($surat->nomor_surat_id == null || $surat->lampiran == null || $surat->perihal == null || $surat->kepada == null || $surat->isi_pembuka == null || $surat->isi_penutup == null)
                            <form action="{{route('buat-surat.submit',$surat->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="row d-flex">
                                            <div class="col-sm-6">
                                                <label>Nomor Surat</label>
                                                <input type="text" placeholder="Nomor Surat" class="form-control mb-3" disabled>                                                           
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group mb-3">
                                                    <label>Jenis Surat</label>
                                                    <select class="form-select form-control @error('nomor_surat_id') is-invalid @enderror" id="exampleFormControlSelect2" name="nomor_surat_id">
                                                        <option selected hidden disabled>Pilih</option>
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
                                                        <option selected hidden disabled>Pilih</option>
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
                                                    <select class="form-select form-control mb-3 @error('tubuh_surat_id') is-invalid @enderror" id="exampleFormControlSelect1" name="tubuh_surat_id">                                                   
                                                        <option selected hidden disabled>Pilih</option>
                                                        <option value="{{$surat->id}}">Acara</option>
                                                        <option value="">Tidak Ada Acara</option>
                                                    </select>
                                                    @error('tubuh_surat_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-3">
                                                    <label>Perihal</label>
                                                    <input type="text" placeholder="Perihal" value="{{old('perihal')}}" class="form-control @error('perihal') is-invalid @enderror" name="perihal">
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
                                                    <input type="text" placeholder="Kepada" value="{{old('kepada')}}" class="form-control @error('kepada') is-invalid @enderror" name="kepada">
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
                                                    <textarea style="height:150px;" class="form-control @error('isi_pembuka') is-invalid @enderror" name="isi_pembuka" placeholder="Isi Pembuka">{{old('isi_pembuka')}}</textarea>
                                                    @error('isi_pembuka')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Isi Surat Penutup</label>
                                                    <textarea style="height:150px;" class="form-control @error('isi_penutup') is-invalid @enderror" name="isi_penutup" placeholder="Isi Penutup">{{old('isi_penutup')}}</textarea>
                                                    @error('isi_penutup')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contoh Isi Surat Pembuka</label>
                                                <textarea style="height:150px;" class="form-control" disabled>{{$pembuka}}</textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contoh Isi Surat Penutup</label>
                                                <textarea style="height:150px;" class="form-control" disabled>{{$penutup}}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3 d-md-flex mx-auto justify-content-md-end">
                                            <button class="col-md-3 btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>

                                            @if($surat->tubuh_surat_id == null)
                                            <a href="{{route('surat-cetak.index')}}" class="btn btn-warning">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
                                            @else
                                            <a href="{{route('surat-agenda.index')}}" class="btn btn-warning">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{route('buat-surat.update', $surat->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
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
                                                    @foreach($nomor as $nomors)
                                                        @if($surat->nomor_surat_id == $nomors->id)
                                                        <option value="{{$surat->nomor_surat_id}}" selected>{{$nomors->id}}. {{$surat->nomor_surat->jenis_surat}}</option>
                                                        @else
                                                        <option value="{{$nomors->id}}">{{$nomors->id}}. {{$nomors->jenis_surat}}</option>
                                                        @endif
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
                                                        @if($surat->lampiran == null)
                                                        <option selected hidden disabled>Pilih</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>               
                                                        @elseif($surat->lampiran == "-")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        @elseif($surat->lampiran == "1")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="-">-</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        @elseif($surat->lampiran == "2")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        @elseif($surat->lampiran == "3")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        @elseif($surat->lampiran == "4")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="5">5</option>
                                                        @elseif($surat->lampiran == "5")
                                                        <option value="{{$surat->lampiran}}" selected>{{$surat->lampiran}}</option>
                                                        <option value="-">-</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        @endif
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
                                                    <select class="form-select form-control mb-3 @error('tubuh_surat_id') is-invalid @enderror" id="exampleFormControlSelect1" name="tubuh_surat_id">                                                   
                                                        @if($surat->tubuh_surat_id == null)
                                                        <option value="{{$surat->id}}">Acara</option>
                                                        <option value="" selected>Tidak Ada Acara</option>
                                                        @else
                                                        <option value="{{$surat->id}}" selected>Acara</option>
                                                        <option value="">Tidak Ada Acara</option>
                                                        @endif
                                                    </select>
                                                    @error('tubuh_surat_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group mb-3">
                                                    <label>Perihal</label>
                                                    <input type="text" placeholder="Perihal" value="{{$surat->perihal}}" class="form-control @error('perihal') is-invalid @enderror" name="perihal">
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
                                                    <input type="text" placeholder="Kepada" value="{{$surat->kepada}}" class="form-control @error('kepada') is-invalid @enderror" name="kepada">
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
                                                    <textarea style="height:150px;" class="form-control @error('isi_pembuka') is-invalid @enderror" name="isi_pembuka" placeholder="Isi Pembuka">{{$surat->isi_pembuka}}</textarea>
                                                    @error('isi_pembuka')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Isi Surat Penutup</label>
                                                    <textarea style="height:150px;" class="form-control @error('isi_penutup') is-invalid @enderror" name="isi_penutup" placeholder="Isi Penutup">{{$surat->isi_penutup}}</textarea>
                                                    @error('isi_penutup')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contoh Isi Surat Pembuka</label>
                                                <textarea style="height:150px;" class="form-control" disabled>{{$pembuka}}</textarea>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Contoh Isi Surat Penutup</label>
                                                <textarea style="height:150px;" class="form-control" disabled>{{$penutup}}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3 d-md-flex mx-auto justify-content-md-end">
                                            <button class="col-md-3 btn btn-primary" type="submit"><i class="bi bi-pencil-square"></i> Perbarui</button>

                                            @if($surat->tubuh_surat_id == null)
                                            <a href="{{route('surat-cetak.index')}}" class="btn btn-warning">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
                                            @else
                                            <a href="{{route('surat-agenda.index')}}" class="btn btn-warning">Lanjut <i class="fa-solid fa-chevron-right"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                        @endif
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
</body>
    @include('layouts.bottom')
</html>