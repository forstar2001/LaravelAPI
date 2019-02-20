@extends('layouts.app')

@section('content')
<style>
    .dimension_table th{
        text-align: center;
    }
</style>
<div class="">
    <h3>Test Area</h3><br/>
    <br/>
    <div class="row"><a href="{{url('test-template/add')}}"class="col-lg-1 btn btn-success pull-right">Add New</a></div>
    <br/>
    @if(Session::has('flash_message'))
        <div class="alert alert-success"> {!! session('flash_message') !!}</div>
    @endif
    <br/>
    <br/>
    <div class="">
        <table class="table   test_template_table">
            <thead>
                <tr>
                    <th class="col-sm-10">Name</th>
                    <th class="col-sm-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($templates)>0)
                @foreach ($templates as $template)
                <tr>
                    <td class="col-sm-10"> <a href="{{url('test-template/edit/'.$template->temp_id)}}">{{$template->temp_name}}</a></td>
                    <td class="col-sm-2">
                        <a href="{{url('test-template/edit/'.$template->temp_id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="{{url('test-template/delete/'.$template->temp_id)}}" onclick="return delete_conf()"><i class="fa fa-trash-o" aria-hidden="true"></i></i></a> 
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
    $(document).ready(function() {
        $('.test_template_table').DataTable();
    });
    
})

//block/unblock confirmation
function delete_conf()
{
    var result = confirm("Do you want to delete this record ?");
    if(result)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
@endsection
