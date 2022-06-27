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
                                            <select class="form-select col-md-2" name="filter_sort">
                                                <option disabled hidden selected>Pilih</option>
                                                <option value="1">Terbaru</option>
                                                <option value="2">Terlama</option>
                                            </select>
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-sliders"></i> Urutkan</button>
                                        </div>     
                                    </form>
                                    
                                    @if($laporan->count() == 0)
                                    <h3 class="fw-bold text-center mb-3">Tahun {{$keywoard->list_tahun}}</h3>   
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                            <th>No.</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Surat Keluar</th>
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
                                            <td>{{$laporans->cetak_surat->buat_surat->no_surat}}</td>
                                            <td>{{$laporans->cetak_surat->created_at->translatedFormat('l, d F Y')}}</td>  
                                            <td>{{$laporans->cetak_surat->user->name}}</td> 
                                            <td>{{$laporans->cetak_surat->buat_surat->kepada}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$laporans->id}}"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                <a href="{{route('list-surat.show', Crypt::encrypt($laporans->id))}}" class="btn btn-success"><i class="bi bi-envelope-open-fill"></i> Lihat</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade " id="exampleModal{{$laporans->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('list-surat.update',$laporans->id)}}" method="post">
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
                                                                                    <label>Perihal</label>
                                                                                    <input type="text" placeholder="Perihal" value="{{$laporans->cetak_surat->buat_surat->perihal}}" name="perihal" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Kepada</label>
                                                                                    <input type="text" name="kepada" value="{{$laporans->cetak_surat->buat_surat->kepada}}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            @if($laporans->cetak_surat->tubuh_surat_id != null)
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Hari, Tanggal</label>
                                                                                    <input type="date" min="{{date('Y-m-d')}}" name="tanggal" value="{{$laporans->cetak_surat->tanggal}}" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Jam</label>
                                                                                    <input type="time" value="{{$laporans->cetak_surat->buat_surat->jam}}" name="jam" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Acara</label>
                                                                                    <input type="text" placeholder="Acara" value="{{$laporans->cetak_surat->buat_surat->acara}}" name="acara" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Tempat</label>
                                                                                    <input type="text" placeholder="Tempat" value="{{$laporans->cetak_surat->buat_surat->tempat}}" name="tempat" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Isi Pembuka</label>
                                                                                    <textarea type="text" placeholder="Isi Pembuka" name="isi_pembuka" style="height: 120px;" class="form-control">{{$laporans->cetak_surat->buat_surat->isi_pembuka}}</textarea>
                                                                                    <label>Contoh Isi Pembuka</label>
                                                                                    <textarea type="text" style="height: 120px;" class="form-control mt-3" disabled>{{$pembuka}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Isi Penutup</label>
                                                                                    <textarea type="text" placeholder="Isi Penutup" name="isi_penutup" style="height: 120px;" class="form-control">{{$laporans->cetak_surat->buat_surat->isi_penutup}}</textarea>
                                                                                    <label>Contoh Isi Penutup</label>
                                                                                    <textarea type="text" style="height: 120px;" class="form-control mt-3" disabled>{{$penutup}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Send message</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </tbody>
                                    </table>
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
    @include('layouts.bottom')
</html>