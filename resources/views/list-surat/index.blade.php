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
                        @empty($data)
                        <div class="col-lg-7">
                            <div class="card mt-5 p-5">
                              <div class="card-body p-4">
                                <div class="text-center mb-4">
                                  <h1 class="display-4 text-warning"><i class="bi bi-emoji-frown"></i></h1>
                                </div>
                                <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada data apapun</p>
                              </div> 
                            </div>
                        </div>
                        @else
                        <div class="col-lg-12">
                            @if(session()->get('sukses'))
                            <div class="alert alert-success">
                                {{session()->get('sukses')}}
                            </div>
                            @endif
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('list-surat.index')}}" method="GET">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="filter_tahun">
                                                <option disabled hidden selected>Pilih Tahun</option>
                                                @foreach($tahun as $alltahun)
                                                <option value="{{$alltahun->list_tahun}}">{{$alltahun->list_tahun}}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-select col-md-2" name="filter_bulan">
                                                <option disabled hidden selected>Pilih Bulan</option>
                                                @foreach($bulan as $allbulan)
                                                @if($allbulan->id < 10)
                                                <option value="0{{$allbulan->id}}">{{$allbulan->nama_bulan}}</option>
                                                @else
                                                <option value="{{$allbulan->id}}">{{$allbulan->nama_bulan}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <select class="form-select col-md-2" name="filter_sort">
                                                <option disabled hidden selected>Urutkan Menurut</option>
                                                <option value="asc">Terbaru</option>
                                                <option value="desc">Terlama</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-sliders"></i> Urutkan</button>
                                        </div>     
                                    </form>
                                    
                                    @if($laporan->count() == null) 
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal</th>
                                            <th>Pembuat</th>
                                            <th>Penerima</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    </table>
                                    <h3 class="text-center text-warning fw-bold mt-3">Tidak menemukan data apapun</h3>
                                    @else
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal</th>
                                            <th>Pembuat</th>
                                            <th>Penerima</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laporan as $laporans)
                                        <tr class="text-center">
                                            <td>{{$no++}}.</td>
                                            <td>{{$laporans->buat_surat->no_surat}}</td>
                                            <td>{{$laporans->buat_surat->created_at->translatedFormat('l, d F Y')}}</td>  
                                            <td>{{$laporans->buat_surat->user->name}}, {{$laporans->buat_surat->user->gelar}} Selaku Ketua UPT KIBT Poliwangi</td> 
                                            <td>{{$laporans->buat_surat->kepada}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$laporans->buat_surat->id}}"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                <a href="{{route('list-surat.show', Crypt::encrypt($laporans->buat_surat->id))}}" class="btn btn-success"><i class="bi bi-envelope-open-fill"></i> Lihat</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="exampleModal{{$laporans->buat_surat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('list-surat.update',$laporans->buat_surat->id)}}" method="post">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Surat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Nomor Surat</label>
                                                                                    <input type="text" placeholder="Nomor Surat" value="{{$laporans->buat_surat->no_surat}}" name="perihal" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Jenis Surat</label>
                                                                                    <select class="form-select form-control @error('nomor_surat_id') is-invalid @enderror" id="exampleFormControlSelect2" name="nomor_surat_id">
                                                                                    @foreach($nomor as $nomors)
                                                                                        @if($laporans->buat_surat->nomor_surat_id == $nomors->id)
                                                                                        <option value="{{$laporans->buat_surat->nomor_surat_id}}" selected>{{$nomors->id}}. {{$laporans->buat_surat->nomor_surat->jenis_surat}}</option>
                                                                                        <option hidden></option>
                                                                                        @else
                                                                                        <option value="{{$nomors->id}}">{{$nomors->id}}. {{$nomors->jenis_surat}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <div class="form-group mb-3">
                                                                                        <label>Lampiran</label>
                                                                                        <select class="form-select form-control mb-3 @error('lampiran') is-invalid @enderror" id="exampleFormControlSelect1" name="lampiran">                                                   
                                                                                            @if($laporans->buat_surat->lampiran == "-")
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="4">4</option>
                                                                                            <option value="5">5</option>
                                                                                            @elseif($laporans->buat_surat->lampiran == "1")
                                                                                            <option value="-">-</option>
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="4">4</option>
                                                                                            <option value="5">5</option>
                                                                                            @elseif($laporans->buat_surat->lampiran == "2")
                                                                                            <option value="-">-</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="4">4</option>
                                                                                            <option value="5">5</option>
                                                                                            @elseif($laporans->buat_surat->lampiran == "3")
                                                                                            <option value="-">-</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            <option value="4">4</option>
                                                                                            <option value="5">5</option>
                                                                                            @elseif($laporans->buat_surat->lampiran == "4")
                                                                                            <option value="-">-</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            <option value="5">5</option>
                                                                                            @elseif($laporans->buat_surat->lampiran == "5")
                                                                                            <option value="-">-</option>
                                                                                            <option value="1">1</option>
                                                                                            <option value="2">2</option>
                                                                                            <option value="3">3</option>
                                                                                            <option value="4">4</option>
                                                                                            <option value="{{$laporans->buat_surat->lampiran}}" selected>{{$laporans->buat_surat->lampiran}}</option>
                                                                                            @endif
                                                                                        </select>
                                                                                        @error('lampiran')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <div class="form-group mb-3">
                                                                                        <label>Agenda</label>
                                                                                        <select class="form-select form-control mb-3" name="tubuh_surat_id" disabled>
                                                                                            @if($laporans->buat_surat->tubuh_surat_id == null)
                                                                                            <option value="{{$laporans->buat_surat->id}}">Acara</option>
                                                                                            <option value="" selected>Tidak Ada Acara</option>
                                                                                            @else
                                                                                            <option value="{{$laporans->buat_surat->id}}" selected>Acara</option>
                                                                                            <option value="">Tidak Ada Acara</option>
                                                                                            @endif
                                                                                        </select>
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Perihal</label>
                                                                                    <input type="text" placeholder="Perihal" value="{{$laporans->buat_surat->perihal}}" name="perihal" class="form-control @error('perihal') is-invalid @enderror">
                                                                                    @error('perihal')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Kepada</label>
                                                                                    <input type="text" name="kepada" value="{{$laporans->buat_surat->kepada}}" class="form-control @error('kepada') is-invalid @enderror">
                                                                                    @error('kepada')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            @if($laporans->buat_surat->tubuh_surat_id != null)
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Hari, Tanggal</label>
                                                                                    <input type="date" min="{{date('Y-m-d')}}" name="tanggal" value="{{$laporans->buat_surat->tubuh_surat->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror">
                                                                                    @error('tanggal')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Jam</label>
                                                                                    <input type="time" value="{{$laporans->buat_surat->tubuh_surat->jam}}" name="jam" class="form-control @error('jam') is-invalid @enderror">
                                                                                    @error('jam')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Acara</label>
                                                                                    <input type="text" placeholder="Acara" value="{{$laporans->buat_surat->tubuh_surat->acara}}" name="acara" class="form-control @error('acara') is-invalid @enderror">
                                                                                    @error('acara')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Tempat</label>
                                                                                    <input type="text" placeholder="Tempat" value="{{$laporans->buat_surat->tubuh_surat->tempat}}" name="tempat" class="form-control @error('tempat') is-invalid @enderror">
                                                                                    @error('tempat')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Isi Pembuka</label>
                                                                                    <textarea type="text" placeholder="Isi Pembuka" name="isi_pembuka" style="height: 120px;" class="form-control @error('isi_pembuka') is-invalid @enderror">{{$laporans->buat_surat->isi_pembuka}}</textarea>
                                                                                    @error('isi_pembuka')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    <label class="mt-4">Contoh Isi Pembuka</label>
                                                                                    <textarea type="text" style="height: 120px;" class="form-control" disabled>{{$pembuka}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Isi Penutup</label>
                                                                                    <textarea type="text" placeholder="Isi Penutup" name="isi_penutup" style="height: 120px;" class="form-control @error('isi_penutup') is-invalid @enderror">{{$laporans->buat_surat->isi_penutup}}</textarea>
                                                                                    @error('isi_penutup')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                    <label class="mt-4">Contoh Isi Penutup</label>
                                                                                    <textarea type="text" style="height: 120px;" class="form-control" disabled>{{$penutup}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi x-square-fill"></i> Tutup</button>
                                                            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Perbarui</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    @if($laporan->count() != null)
                                    {{$laporan->links('layouts.pagination')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endempty
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