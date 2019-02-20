@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel-heading"><h3> Settings</h3></div>
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
            @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-success">
                   {{Session::get('message')}}     
                </div>
            @endif
            
            <form class="form-horizontal  col-lg-offset-2" method="post" action="{{url('settings/email/update')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                      <input type="text" name="currentEmail" class="form-control" placeholder="Current Email" value="{{Auth::user()->email}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                      <input type="text" name="newEmail" class="form-control" placeholder="New Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5">
                      <input type="text" name="newEmail_confirmation" class="form-control" placeholder="Confirm New Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-5 text-center">
                      <button type="reset" class="btn btn-primary"> Cancel </button>
                      <button type="submit" class="btn btn-success"> Save </button>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection