<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->foto_profil == null)
            <img src="{{ asset('vendor/dist/img/logo.png')}}" class="img-circle elevation-2" style="width:40px; height:40px">
          @else
            <img src="{{asset('assets/foto profil/'.Auth::user()->foto_profil)}}" class="img-circle elevation-2" style="width:40px; height:40px">
          @endif
          </div>
        <div class="info">
            <a href="{{route('profil.index')}}" class="d-block">{{Auth::user()->name}}, {{Auth::user()->gelar}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            @if($judul == 'Beranda')
            <a href="" class="nav-link active disabled">
            @else
            <a href="/home" class="nav-link">
            @endif
            <i class="nav-icon fas bi-house-fill"></i>
            <p>
                Beranda
            </p>
            </a>
        </li>
        <li class="nav-item">
          @if($judul == 'Buat Surat' || $judul == 'Cetak Surat')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('buat-surat.index')}}" class="nav-link">
          @endif
              
              <i class="nav-icon fas fa-solid fa-file-pen"></i>
              <p>
                Buat Surat
              </p>
            </a>
          </li>
        <li class="nav-item">
          @if($judul == 'Laporan Surat Keluar')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('laporan.index')}}" class="nav-link">
          @endif
            <i class="nav-icon fas bi-clipboard2-pulse-fill"></i>
            <p>
                Laporan Surat Keluar 
            </p>
            </a>
        </li>
        <li class="nav-item">
          @if($judul == 'List Surat Keluar' || $judul == 'Detail Surat Keluar')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('list-surat.index')}}" class="nav-link">
          @endif
            <i class="nav-icon fas fa-solid fa-file-lines"></i>
            <p>
                List Surat Keluar 
            </p>
            </a>
        </li>
        <li class="nav-item menu-open">
          @if($judul == 'Rekapitulasi Bulan' || $judul == 'Rekapitulasi Jenis Surat')
            <a href="" class="nav-link active disabled">
          @else
            <a href="" class="nav-link">
          @endif
            <i class="nav-icon fas bi-clipboard2-data-fill"></i>
            <p>
                Rekapitulasi Surat Keluar 
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if($judul == 'Rekapitulasi Bulan')
                  <a href="{{route('rekapitulasi.bulan.index')}}" class="nav-link active">
                @else
                  <a href="{{route('rekapitulasi.bulan.index')}}" class="nav-link">
                @endif  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bulan</p>
                </a>
              </li>
              <li class="nav-item">
                @if($judul == 'Rekapitulasi Jenis Surat')
                  <a href="{{route('rekapitulasi.jenis_surat.index')}}" class="nav-link active">
                @else
                  <a href="{{route('rekapitulasi.jenis_surat.index')}}" class="nav-link">
                @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Surat</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
            @if($judul == 'Anggota' || $judul == 'Registrasi Akun Anggota' || $judul == 'Ubah Akun Anggota')
            <a href="" class="nav-link active disabled">
            @else
            <a href="{{route('anggota-upt-kibt-poliwangi.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fas fa-solid fa-user-group"></i>
              <p>
                Anggota
              </p>
            </a>
        </li>
        <li class="nav-item">
          @if($judul == 'Konfigurasi Surat')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('konfigurasi-surat.index')}}" class="nav-link">
          @endif
            <i class="nav-icon fas fa-solid fa-gear"></i>
            <p>
                Konfigurasi Surat 
            </p>
            </a>
        </li>
        <div class="user-panel pb-3 mb-3 d-flex"></div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="nav-icon fas bi-power nav-icon"></i>
                <p>Keluar</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>