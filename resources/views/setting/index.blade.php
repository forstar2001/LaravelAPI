@extends('layouts.app')

@section('content')
<div class="row">
    <!--<div class="col-sm-12">-->
        <h3>Settings</h3>
        <br/>
        <br/>
                
        <div class="row">
            <div class="col-lg-3 col-lg-offset-4">
                <a href="{{url('settings/email/update')}}" class="btn btn-default col-lg-10" role="button"> Update Email </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-4">
                <a href="{{url('settings/password/update')}}" class="btn btn-default col-lg-10" role="button"> Update Password </a>
            </div>
        </div>
</div>
@endsection
