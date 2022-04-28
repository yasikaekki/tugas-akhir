<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-primary shadow">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <div class="container-fluid">
    <a href="{{ route('home') }}" class="nav-link text-dark fw-bold"><p>UPT KIBT Poliwangi</p></a>
  </div>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('vendor/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
            <a href="/home" class="nav-link">
            <i class="nav-icon fas bi-house-fill"></i>
            <p>
                Beranda
            </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{route('nomor.index')}}" class="nav-link">
              <i class="nav-icon fas bi-file-earmark-text-fill"></i>
              <p>
                Buat Surat
            </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('laporan.index')}}" class="nav-link">
            <i class="nav-icon fas bi-clipboard2-pulse-fill"></i>
            <p>
                Laporan Surat Keluar 
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('rekapitulasi.index')}}" class="nav-link">
            <i class="nav-icon fas bi-clipboard2-data-fill"></i>
            <p>
                Rekapitulasi Surat Keluar 
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('anggota.index')}}" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user-group"></i>
              <p>
                Anggota
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('konfigurasi.index')}}" class="nav-link">
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