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
                            {{-- @if($laporan->nomor_surat == null)
                            <form action="{{route('nomor.store')}}" method="POST">
                                @method('PATCH')
                                @csrf
                            @else --}}
                            <form action="{{route('nomor.store')}}" method="POST">
                                @csrf
                            {{-- @endif --}}
                                <div class="card border-top-info p-4">
                                    <div class="card-body">    
                                        <div class="form-group mb-3">
                                            <label>Nomor Surat</label>
                                            <input type="text" placeholder="Nomor Surat" class="mb-3 form-control" name="nomor_surat" disabled>
                                        </div>       
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Surat</label>
                                            <select class="form-select form-control mb-3 @error('nomor_surat') is-invalid @enderror" id="exampleFormControlSelect1" name="nomor_surat">
                                                <option value="null" selected hidden disabled>Pilih</option>
                                                @foreach($nomor as $nomors)
                                                @if($nomors->id < 10)
                                                <option value="0{{$nomors->id}}.0{{$nomors->id}}/UPTKIBT/{{$bulan}}/{{$tahun}}">{{$nomors->jenis_surat}}</option>
                                                @else
                                                <option value="{{$nomors->id}}.{{$nomors->id}}/UPTKIBT/{{$bulan}}/{{$tahun}}">{{$nomors->jenis_surat}}</option>
                                                @endif
                                                @endforeach
                                               {{-- @endforeach --}}
                                            </select>
                                            @error('nomor_surat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="mt-5 btn btn-success btn-block">Simpan</button>
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