@extends('layouts.adminLTE')

@section('user',Auth::user()->username)
@section('main')

<div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Modal Examples</h3>
        </div>
        <!--
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
          Launch Default Modal
        </button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
          Launch Info Modal
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
          Launch Danger Modal
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
          Launch Warning Modal
        </button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
          Launch Success Modal
        </button>
        <div class="box-body">
         </div> 
        -->
         
        @foreach ($users as $user)
        {{$user->username}}  
        @endforeach
        
        

        </div>
      </div>
    </div>
  </div>
    
@endsection