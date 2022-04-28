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
                            <form action="{{route('nomor.update', $nomor->id)}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="card border-top-info p-4">
                                    <div class="card-body">    
                                        <div class="form-group mb-3">
                                            <label>Nomor Surat</label>
                                            <input type="text" value="{{$nomor->nomor_surat}}" placeholder="Nomor Surat" class="form-control" disabled>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlSelect1">Nomor Urut Surat</label>
                                                    <select class="form-select form-control mb-3 @error('id_no_surat') is-invalid @enderror" id="exampleFormControlSelect1" name="id_no_surat">
                                                    <option value="null" selected hidden disabled>Pilih</option>
                                                    {{-- @foreach ($nomor as $nomors) --}}
                                                        {{-- <option value="{{$nomors->id}}">{{$nomors->kode_surat}}</option>  --}}
                                                    @foreach($jenissurat as $jenissurats)
                                                        <option value="{{$jenissurats->id}}">{{$jenissurats->id}}</option>
                                                    @endforeach
                                                    {{-- @endforeach --}}
                                                    </select>
                                                    @error('id_no_surat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlSelect2">Jenis Surat</label>
                                                    <select class="form-select form-control mb-3 @error('nomor_surat') is-invalid @enderror" id="exampleFormControlSelect2" name="nomor_surat">
                                                       <option value="null" selected hidden disabled>Pilih</option>
                                                       {{-- @foreach ($nomor as $nomors) --}}
                                                        {{-- <option value="{{$nomors->id}}">{{$nomors->kode_surat}}</option>  --}}
                                                       @foreach($jenissurat as $jenissurats)
                                                       @if($jenissurats->id < 10)
                                                        <option value="0{{$jenissurats->id}}.0{{$jenissurats->id}}/UPTKIBT/{{$bulan}}/{{$tahun}}">{{$jenissurats->id}}. {{$jenissurats->jenis_surat}}</option>
                                                       @else
                                                        <option value="{{$jenissurats->id}}.{{$jenissurats->id}}/UPTKIBT/{{$bulan}}/{{$tahun}}">{{$jenissurats->id}}. {{$jenissurats->jenis_surat}}</option>
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
                                            </div>                                           
                                        </div>   
                                        
                                        <div class="form-group mt-5">
                                            <div class="d-grid gap-2 d-md-flex mx-auto justify-content-md-center">
                                                @if($nomor->id_no_surat == null || $nomor->nomor_surat == null)
                                                <button class="col-md-6 btn btn-primary" type="submit">Simpan</button>
                                                @else
                                                <button class="col-md-6 btn btn-primary" type="submit">Perbarui</button>
                                                @endif
                                                <a href="{{route('pembuka.index')}}" class="col-md-6 btn btn-success">Lanjut</a>
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