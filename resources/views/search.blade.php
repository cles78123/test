@extends('layouts.adminLTE')
@section('title','會員總覽')
@section('user','會員 '.Auth::user()->username)

@section('main')
          
          @foreach ($users_search as $user)
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
       
         
       
        

@endsection