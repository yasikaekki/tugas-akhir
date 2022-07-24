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
                        <div class="col-lg-12">
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <div id="grafik"></div>
                                </div>
                            </div>
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script type="text/javascript">
                                var rekap =  <?php echo json_encode($arrdata) ?>;
                                var bulan =  <?php echo json_encode($arrbulan) ?>;

                                Highcharts.chart('grafik', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Grafik Rekapitulasi Jenis Surat'
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
                                    },
                                    xAxis: {
                                        categories: bulan
                                    },
                                    yAxis: {
                                        title: {
                                            text: 'Jumlah Surat Keluar Tiap Bulan'
                                        }

                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        series: {
                                            borderWidth: 0,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.y:.f}'
                                            }
                                        }
                                    },

                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> of total<br/>'
                                    },

                                    series: [
                                        {
                                            colorByPoint: true,
                                            data: rekap
                                        }
                                    ]
                                });
                            </script>
                            <div class="card border-top-info p-4">
                                <div class="card-body">
                                    <form action="{{route('rekapitulasi.bulan.index')}}" method="GET">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <select class="form-select col-md-2" name="fitur_filter" data-dependent="state">
                                                <option value="" disabled hidden selected>Pilih Tahun</option>
                                                @foreach ($tahun as $alltahun)
                                                <option value="{{$alltahun->id}}">{{$alltahun->list_tahun}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-sliders"></i> Tampilkan</button>
                                        </div>     
                                    </form>

                                    @if(is_null($keywoard->buat_surat_id))
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
                                    <h3 class="fw-bold text-center mb-3">Tahun {{$keywoard->list_tahun}}</h3>   
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-secondary text-center">
                                        <th>No.</th>
                                        <th>Bulan</th>
                                        <th>Jumlah Surat Keluar</th>
                                        </tr>
                                    </thead>
                                        
                                    <tbody class="text-center">
                                        @foreach($listbulan as $rekaps)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$rekaps->nama_bulan}}</td>
                                            @if($keywoard->id == 1)
                                            <td>
                                                @if($rekaps->tahun_satu == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_satu}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 2)  
                                            <td>
                                                @if($rekaps->tahun_dua == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_dua}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 3)  
                                            <td>
                                                @if($rekaps->tahun_tiga == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_tiga}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 4)  
                                            <td>
                                                @if($rekaps->tahun_empat == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_empat}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 5)  
                                            <td>
                                                @if($rekaps->tahun_lima == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_lima}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 6)  
                                            <td>
                                                @if($rekaps->tahun_enam == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_enam}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 7)  
                                            <td>
                                                @if($rekaps->tahun_tujuh == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_tujuh}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 8)  
                                            <td>
                                                @if($rekaps->tahun_delapan == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_delapan}}
                                                @endif
                                            </td> 
                                            @elseif($keywoard->id == 9)  
                                            <td>
                                                @if($rekaps->tahun_sembilan == null)   
                                                Belum ada surat yang dikeluarkan
                                                @else
                                                {{$rekaps->tahun_sembilan}}
                                                @endif
                                            </td> 
                                            @endif                   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    
                                    @endif
                                    
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
</body>
    @include('layouts.bottom')
</html>