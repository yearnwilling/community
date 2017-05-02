@extends('base')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>社团管理系统后台登录</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form action="{{ route('admin_login') }}" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email/Username" name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" >
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                @foreach (['danger', 'warning', 'success', 'info', 'status'] as $msg)
                    @if(session()->has($msg))
                        <div class="flash-message">
                            <p class="alert alert-{{ $msg }}">
                                {{ session()->get($msg) }}
                            </p>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> 记住我
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                    </div>
                    <!-- /.col -->
                </div>
                {{ csrf_field() }}
            </form>
            <a href="#">忘记密码</a>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection