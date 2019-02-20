@extends('layouts.app')

@section('content')
<style>
    .dimension_table th{
        text-align: center;
    }
</style>
<div class="">
    <h3>Template Management</h3><br/>
    <br/>
    <div class="row"></div>
    
    @if(Session::has('flash_message'))
        <div class="alert alert-success"> {!! session('flash_message') !!}</div>
    @endif
    <br/>
    <div class="row">
        <label class="col-sm-1">Category</label>
        <div class="col-sm-2">
        @if(count($categories)>0)
            <select class=" form-control" name="category" id="category_selected">
                 @foreach($categories as $cat)
                 <option value="{{$cat->category_id}}" <?php echo ($cat_id==$cat->category_id)?'selected':'';?>>{{$cat->category_name}}</option>
                 @endforeach
            </select>
         @endif
         </div>
        <div class="col-sm-2"></div>
      <div class="col-sm-2 pull-right">
        <a href="{{url('template/add')}}"class=" btn btn-success pull-right">Add New</a>
    </div> 
    </div>
    <br/>
    <br/>
    <div class="">
        <table class="table   template_table">
            <thead>
                <tr>
                    <th class="col-sm-5">Name</th>
                    <th class="col-sm-5">Free</th>
                    <th class="col-sm-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($templates)>0)
                @foreach ($templates as $template)
                <tr>
                    <td class="col-sm-5"> <a href="{{url('template/edit/'.$template->template_id)}}">{{$template->template_name}}</a></td>
                    <td class="col-sm-5">
                        @if($template->sub_only>0)
                            No
                        @else
                            Yes
                        @endif
                    </td>
                    <td class="col-sm-2">
                        <a href="{{url('template/edit/'.$template->template_id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.template_table').DataTable();
    
    //take category it
    $('#category_selected').change(function(){
        var category = $('#category_selected').val();
        window.location = "<?php echo url('templates/list')?>?id="+category;
    });
})
</script>
@endsection
