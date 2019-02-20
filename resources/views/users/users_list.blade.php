@extends('layouts.app')

@section('content')
<style>
    .dimension_table th{
        text-align: center;
    }
</style>
<div class="">
    <h3>User Management</h3><br/>
    
    <div class="">
        <table class="table   app_user_table">
            <thead>
                <tr>
                    <th >Username</th>
                    <th >Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users)>0)
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td >{{$user->email}}</td>
                    <td>
                        <a href="{{URL('user/'.$user->user_id.'/block')}}" onclick=" return block_confirmation('{{$user->username}}',{{$user->is_blocked}})"><i class="fa fa-ban" aria-hidden="true" <?php echo ($user->is_blocked>0)?'style="color:red;font-size:16px"':'style="color:grey;font-size:16px"';?>></i> | <a href="{{URL('user/'.$user->user_id.'/details')}}"><i class="glyphicon glyphicon-th-large"></i></a>
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
        $('.app_user_table').DataTable();
    });
})

//block/unblock confirmation
function block_confirmation(name,status)
{
    if(status>0){
        var status_v = 'unblock';
    }else{
         var status_v = 'block';
    }
    var result = confirm("Do you want to "+status_v+" "+name+" ?");
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
