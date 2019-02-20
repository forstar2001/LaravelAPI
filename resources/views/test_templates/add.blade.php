@extends('layouts.app')

@section('content')
<!--<div class="container">-->
<style>
    .error{
        color: red;
    }
</style>
<h3>New Template</h3><br/>
<br/><br/>
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
    <div class="row">
        <form  id="addQue" class="form-horizontal" method="POST" action="{{url('test_template/save')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name*</label>
                <div class="col-sm-6">
                    <input type="text" name="test_temp_name" class="form-control" value="{{old('test_temp_name')}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Choose a file*</label>
                <div class="col-sm-6">
                    <input type="file" name="test_temp_image" class="form-control" >
                    <small><em>Only .svg file permitted</em></small>
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Complete</label>
                <div class="col-sm-10">
                    <input type="reset" class="btn btn-primary" value="Cancel">
                    <input class="btn btn-success " type="submit" value="Save">
                </div>
            </div>
        </form>
    </div>
@endsection
