@extends('layouts.adminLTE')

@section('user',Auth::user()->username)
@section('main')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
          <button type="button" class="btn btn-default btn-block" onclick="location.href='{{ asset('insert') }}'">新增</button></h3>
        <div class="box-tools">
          <form class="form-horizontal" method="POST" action="{{ asset('search') }}">
            {{ csrf_field() }}
          <div class="input-group input-group hidden-xs" style="width: 150px;">
            <input type="text" name="username" class="form-control pull-right" placeholder="帳號"  value="{{ old('name') }}" required autofocus>
            <div class="input-group-btn">
            <button type="submit" class="btn btn-default">搜尋</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>編號</th>
            <th>帳號</th>
            <th>註冊時間</th>
            <th>電子信箱</th>
            <th>功能</th>
          </tr>
          
          @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->email}}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default" onclick="location.href='{{ asset('edit') }}/{{$user->id}}'">修改</button>
                  <button type="button" class="btn btn-default" onclick="location.href='{{ asset('delete') }}/{{$user->id}}'">刪除</button>
                </div>
              </td>
            </tr>
          @endforeach
          
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
         
       
        

@endsection