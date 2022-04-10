@extends('layouts.informationPage')

@section('title','註冊')
@section('body')
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#">我的網站</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <form action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        
          <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
            <input id="text" name="username" type="type" class="form-control" placeholder="帳號" value="{{ old('username') }}" required autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
            
          </div>

          <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="密碼" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登入</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
    
        <a href="{{ route('password.request') }}">忘記密碼</a><br>
        <a href=" {{ route('register') }}" class="text-center">註冊帳號</a>
       
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection  


