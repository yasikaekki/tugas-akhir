  <!-- Navbar -->
  @if($judul == 'Selamat Datang')
  <nav class="navbar navbar-expand navbar-white navbar-light fixed-top shadow">
    <div class="container-fluid">
      <a href="{{ url('/home') }}" class="nav-link nav-center text-dark fw-bold">UPT KIBT Poliwangi</a>
    </div>
  </nav>
  @else
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top shadow">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div class="container-fluid">
      <a href="{{ url('/home') }}" class="nav-link text-dark fw-bold"><p>UPT KIBT Poliwangi</p></a>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      @if($judul == 'Anggota KIBT' || $judul == 'Biodata Anggota KIBT')
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      @endif
    </ul>
  </nav>
  @endif
  <!-- /.navbar -->