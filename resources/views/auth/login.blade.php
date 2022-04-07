<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.toplogin')
</head>
<body>
    @include('layouts.navigation')
    <div class="bg-info">
        <div class="container-fluid p-2">
            <div class="main">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card text-dark mt-5 p-4">
                                <div class="card-body">
                                    <h3 class="mb-5 text-center">Login</h2>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3 form-group">
                                            <label>Email</label>
                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label>Password</label>
                                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                  
                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="submit" class="btn btn-primary form-control">{{ __('Masuk') }}</button>
                                        </div>
                                    </form>
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
