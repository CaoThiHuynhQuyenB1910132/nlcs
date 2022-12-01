@extends('client.layout.app')

@section('content')

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Đăng Ký</h2>
            </div>
            <div class="col-md-7">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="p-3 p-lg-5 border">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" class="text-black">Tên <span
                                        class="text-danger">*</span></label>
                                <input type="name" class="form-control" id="name" name="name"
                                    placeholder="">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="text-black">Mật Khẩu <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="">
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="text-black">Nhắc lại mật khẩu <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                    placeholder="">
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <a href="{{route('login')}}">Đăng nhập</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block"
                                    value="Đăng Ký">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection