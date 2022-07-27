@extends('layouts.masterlog')
@section('tittle', 'Register')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                <h5 class="content-group">Buat Akun <small class="display-block">Isi semua data</small></h5>
            </div>

            <!-- <div class="content-divider text-muted form-group"><span>Your credentials</span></div> -->

            <div class="form-group has-feedback has-feedback-left">
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama') }}" required autocomplete="nama" autofocus placeholder="Nama">

                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>
                </div>
                <!-- <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span> -->
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-mention text-muted"></i>
                </div>
            </div>

            <input type="hidden" name="role" id="role" value="User">
            {{-- <div class="form-group has-feedback has-feedback-left">
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                        <option value="">--Pilih Role--</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                    
                    @error('role')
                        <span class="invalid-feedback danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                <div class="form-control-feedback">
                    <i class="icon-cog2 text-muted"></i>
                </div>
            </div> --}}

            <div class="form-group has-feedback has-feedback-left">
                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                    name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus
                    placeholder="Nomor Handphone">

                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-phone text-muted"></i>
                </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <label for="alamat" class="col-md-4 col-form-label text-md-end text-muted">{{ __('Alamat') }}</label>

                <div class="">
                    {{-- <input id="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                            value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="Alamat"> --}}
                    <textarea name="alamat" id="alamat" cols="40" rows="3" required autocomplete="alamat" autofocus>{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Konfirmasi Password">
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                </div>

                <!-- <div class="content-divider text-muted form-group"><span>Your privacy</span></div> -->

                <!-- <div class="content-divider text-muted form-group"><span>Additions</span></div>

                                                                                                                  <div class="form-group">
                                                                                                                   <div class="checkbox">
                                                                                                                    <label>
                                                                                                                     <div class="checker"><span class="checked"><input type="checkbox" class="styled" checked="checked"></span></div>
                                                                                                                     Send me <a href="#">test account settings</a>
                                                                                                                    </label>
                                                                                                                   </div>

                                                                                                                   <div class="checkbox">
                                                                                                                    <label>
                                                                                                                     <div class="checker"><span class="checked"><input type="checkbox" class="styled" checked="checked"></span></div>
                                                                                                                     Subscribe to monthly newsletter
                                                                                                                    </label>
                                                                                                                   </div>

                                                                                                                   <div class="checkbox">
                                                                                                                    <label>
                                                                                                                     <div class="checker"><span><input type="checkbox" class="styled"></span></div>
                                                                                                                     Accept <a href="#">terms of service</a>
                                                                                                                    </label>
                                                                                                                   </div>
                                                                                                                  </div> -->

                <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i
                        class="icon-circle-right2 position-right"></i></button>
            </div>
    </form>
@endsection
