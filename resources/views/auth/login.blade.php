@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="mb-5">Sign In</h2>
                    <p>Belum punya akun? <a href="register.html">Daftar di sini</a></p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-grid d-md-block mb-3">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label for="remember" class="form-check-label ml-2">Ingat Saya</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Lupa Password?</a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <a href="#" class="btn btn-primary form-control">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
