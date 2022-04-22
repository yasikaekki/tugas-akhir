<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('vendor/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('profil.index')}}" class="d-block">Alexander Pierce</a>
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
          @if($judul == 'Nomor Surat' || $judul == 'Surat Pembuka' || $judul == 'Tubuh Surat' || $judul == 'Surat Penutup')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('nomor.index')}}" class="nav-link">
          @endif
              <i class="nav-icon fas bi-file-earmark-text-fill"></i>
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
          @if($judul == 'Rekapitulasi Surat Keluar')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('rekapitulasi.index')}}" class="nav-link">
          @endif
            <i class="nav-icon fas bi-clipboard2-data-fill"></i>
            <p>
                Rekapitulasi Surat Keluar 
            </p>
            </a>
        </li>
        <li class="nav-item menu-open">
            @if($judul == 'Anggota KIBT' || $judul == 'Registrasi Anggota KIBT' || $judul == 'Biodata Anggota KIBT')
            <a href="" class="nav-link active disabled">
            @else
            <a href="" class="nav-link">
            @endif
              <i class="nav-icon fas fa-solid fa-user-group"></i>
              <p>
                Anggota
              <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if($judul == 'Anggota KIBT')
                <a href="" class="nav-link active disabled">
                @else
                <a href="{{route('anggota.index')}}" class="nav-link">
                @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun Anggota</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if($judul == 'Biodata Anggota KIBT')
                <a href="" class="nav-link active disabled">
                @else
                <a href="{{route('anggota.biodata.index')}}" class="nav-link">
                @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Biodata Anggota</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
          @if($judul == 'Konfigurasi Kop Surat')
            <a href="" class="nav-link active disabled">
          @else
            <a href="{{route('konfigurasi.index')}}" class="nav-link">
          @endif
            <i class="nav-icon fas fa-solid fa-gear"></i>
            <p>
                Konfigurasi Kop Surat 
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