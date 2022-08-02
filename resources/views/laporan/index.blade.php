<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.top')
  <style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #3490dc;
    }
    .read-more-hide{
      cursor:pointer;
      color: #3490dc;
    }

    .hide_content{
      display: none;
    }
</style>
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
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('laporan.index')}}" method="GET">
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
                                                <option value="desc">Terbaru</option>
                                                <option value="asc">Terlama</option>
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
                                            <th>Jenis Surat</th>
                                            <th>Perihal</th>
                                            <th>Agenda</th>
                                            <th>Isi Pembuka</th>
                                            <th>Isi Penutup</th>
                                            <th>Tanggal</th>
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
                                            <th>Jenis Surat</th>
                                            <th>Perihal</th>
                                            <th>Agenda</th>
                                            <th>Isi Pembuka</th>
                                            <th>Isi Penutup</th>
                                            <th>Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($laporan as $laporans)
                                        <tr class="text-center hasil-filter">
                                            <td>{{$no++}}.</td>
                                            <td>{{$laporans->buat_surat->no_surat}}</td>
                                            <td>{{$laporans->buat_surat->nomor_surat->jenis_surat}}</td>  
                                            <td>{{$laporans->buat_surat->perihal}}</td>
                                            @if($laporans->tubuh_surat_id != null)  
                                            <td>{{$laporans->tubuh_surat->acara}}</td>  
                                            @else
                                            <td>Tidak ada agenda</td>
                                            @endif
                                            @if(strlen($laporans->buat_surat->isi_pembuka) > 70)
                                            <td>
                                                {{substr($laporans->buat_surat->isi_pembuka,0,70)}}
                                                <span class="read-more-show hide_content">... Read More</i></span>
                                                <span class="read-more-content">{{substr($laporans->buat_surat->isi_pembuka,70,strlen($laporans->buat_surat->isi_pembuka))}} 
                                                <span class="read-more-hide hide_content">Read Less</span> </span>
                                            </td>
                                            @else  
                                            <td>
                                                {{$laporans->buat_surat->isi_pembuka}}
                                            </td> 
                                            @endif 
                                            @if(strlen($laporans->buat_surat->isi_penutup) > 70)
                                            <td>
                                                {{substr($laporans->buat_surat->isi_penutup,0,70)}}
                                                <span class="read-more-show hide_content">... Read More</i></span>
                                                <span class="read-more-content">{{substr($laporans->buat_surat->isi_penutup,70,strlen($laporans->buat_surat->isi_penutup))}} 
                                                <span class="read-more-hide hide_content">Read Less</span> </span>
                                            </td> 
                                            @else
                                            <td>
                                                {{$laporans->buat_surat->isi_penutup}}
                                            </td>
                                            @endif
                                            <td>{{$laporans->buat_surat->created_at->translatedFormat('l, d F Y')}}</td>      
                                        </tr>

                                        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                                        <script type="text/javascript">

                                            $('.read-more-content').addClass('hide_content')
                                            $('.read-more-show, .read-more-hide').removeClass('hide_content')

                                            $('.read-more-show').on('click', function(e) {
                                                $(this).next('.read-more-content').removeClass('hide_content');
                                                $(this).addClass('hide_content');
                                                e.preventDefault();
                                            });

                                            $('.read-more-hide').on('click', function(e) {
                                                var p = $(this).parent('.read-more-content');
                                                p.addClass('hide_content');
                                                p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
                                                e.preventDefault();
                                            });
                                        </script>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    <script>
                                        function myFunction() {
                                            var dots = document.getElementById("dots");
                                            var moreText = document.getElementById("more");
                                            var btnText = document.getElementById("myBtn");

                                            if (dots.style.display == "none") {
                                                dots.style.display = "inline";
                                                btnText.innerHTML = "Read more";
                                                moreText.style.display = "none";
                                            } else {
                                                dots.style.display = "none";
                                                btnText.innerHTML = "Read less";
                                                moreText.style.display = "inline";
                                            }
                                        }
                                    </script>
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