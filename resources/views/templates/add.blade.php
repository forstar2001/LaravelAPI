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
    <form  id="addQue" class="form-horizontal" method="POST" action="{{url('template/save')}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Select a Category</label>
            <div class="col-sm-6">
                <select name="category" class="form-control">
                    @if(count($categories)>0)
                    @foreach($categories as $cat)
                    <option value="{{$cat->category_id}}" {{(old('category') == $cat->category_id)?'selected':''}}>{{$cat->category_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name*</label>
            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Choose a file*</label>
            <div class="col-sm-6">
                <input type="file" name="image" class="form-control" value="{{old('image')}}">
                <small><em>Only .svg file permitted</em></small>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Subscribers Only</label>
            <div class="col-sm-6">
                <input type="radio" value="1" name="sub_only" {{(old('sub_only') == 1)?'checked':''}}>Yes
                &nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="sub_only" {{(old('sub_only') == 0)?'checked':''}}>No
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Complete</label>
            <div class="col-sm-10">
                <input type="reset" class="btn btn-primary" value="Cancel">
                <input class="btn btn-success " type="submit" value="Publish">
            </div>
        </div>
    </form>
</div>
@endsection
