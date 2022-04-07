<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.top')
</head>
<body>
    @include('layouts.navbar')
    <div class="bg-info">
        <div class="container-fluid p-2">
            <div class="main">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <h2 class="text-center mt-5 mb-2">Selamat Datang!</h2>
                        <p class="text-center mb-5">SISTEM INFORMASI SURAT KELUAR UPT KIBT POLIWANGI</p>
                        <div class="col-lg-4">
                            <div class="card text-dark text-center p-4">
                                <div class="card-body">
                                    <p class="mb-5">Silahkan login untuk melanjutkan</p>
                                    <div class="d-grid mx-auto">
                                        <a href="{{route('login')}}" class="mt-2 btn btn-primary">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F5F6FA" fill-opacity="1" d="M0,96L48,96C96,96,192,96,288,122.7C384,149,480,203,576,208C672,213,768,171,864,170.7C960,171,1056,213,1152,208C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
</body>
@include('layouts.bottom')
</html>