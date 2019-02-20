@extends('layouts.app')

@section('content')
<!--<div class="container">-->
<style>
    .element_changes{
        color:#827777;
        font-weight: 500;
    }
</style>
<h3>User Details</h3><br/>
    
    <div>
        <br/>
        <br/>
        
        <div  class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Username: </label>
                <div class="col-sm-10">
                    <label for="inputEmail3" class="control-label ">{{$user['details']->username}}</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email: </label>
                <div class="col-sm-10">
                    <label for="inputEmail3" class="control-label ">{{$user['details']->email}}</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">No of Posts: </label>
                <div class="col-sm-10">
                    <label for="inputEmail3" class="control-label ">{{$user['posts']}}</label>
                </div>
            </div>
        </div>    
    </div>
@endsection
