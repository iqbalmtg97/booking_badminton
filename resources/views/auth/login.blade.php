@extends('layouts.masterlog')
@section('tittle',"Login")
@section('content')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-warning-400 text-warning-400"><i class="icon-people"></i></div>
							<h5 class="content-group-lg">Login Akun <small class="display-block">Masukan Email & Password Anda</small></h5>
						</div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <a href="{{ route('password.request') }}">Lupas password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                            </div>

                            <!-- <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
                            <ul class="list-inline form-group list-inline-condensed text-center">
                                <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
                                <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
                                <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
                            </ul> -->

                            <div class="content-divider text-muted form-group"><span>Tidak punya Akun?</span></div>
                            <a href="{{url('/register')}}" class="btn bg-slate btn-block content-group">Register</a>
					</div>
				</form>
@endsection
