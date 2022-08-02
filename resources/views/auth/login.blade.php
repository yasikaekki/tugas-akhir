<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.tittle')
</head>
<body class="bg-info">
    @include('layouts.navigation')
    <div class="container-fluid">
        <div class="main">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card text-dark p-4">
                            <div class="card-header text-center">
                              <a href="{{route('home')}}" class="h1"><b>UPT KIBT </b>Poliwangi</a>
                            </div>
                            <div class="card-body">
                              <p class="login-box-msg">Silahkan masuk untuk memulai sesi Anda</p>
                        
                              <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                  <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-envelope"></span>
                                    </div>
                                  </div>
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="input-group mb-3">
                                  <input type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="row">
                                  <div class="col-8">
                                    <div class="icheck-primary">
                                      <input type="checkbox" id="remember">
                                      <label for="remember">
                                        Ingat Saya
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <div class="mt-3 mb-2">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Masuk</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('layouts.bottom')
</html>
