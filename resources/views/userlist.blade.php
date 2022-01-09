@extends('template.master')

@section('content')
<div class="mb-3 mt-5 float-right">
    <a class="btn btn-info" href="/add">Add User</a>
</div>

<table id="userList" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Contact Number</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
</table>
<script>
    $(document).ready(function() {
    $('#userList').DataTable( {
        "paging": false,
          "lengthChange": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "responsive": true,
          "searching": false,
          "processing": true,
          "serverSide": true,
          "ordering": false,
        columns:[
            {data:'id'},
            {data:'name'},
            {data:'designation'},
            {data: 'contact_number'},
            {data: 'view',
                render: function(data, type) {
                    return '<a href="/user/'+data+'" class="btn btn-info" >View</a>'
                },
            },
            {data: 'edit',
                render: function(data, type) {
                    return '<a href="/edit/'+data+'" class="btn btn-success" >Edit</a>'
                },
            },
            {data: 'delete',
                render: function(data, type) {
                    return '<a href="/delete/'+data+'" class="btn btn-danger" >Delete</a>'
                },
            }
        ],
        "ajax":{
            'url':"/api/v1/list",
            'type':'GET',
            'beforeSend': function (request) {
                request.setRequestHeader("Authorization",  'Bearer '+localStorage.getItem('access_token'));
            }
        }
    } );
} );
</script>

@endsection()
