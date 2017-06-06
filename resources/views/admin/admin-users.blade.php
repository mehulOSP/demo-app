@extends('admin.layout.master')
@section('title','Admin Users')

@section('content')

<section class="content-header">
  <h1>Users</h1>
</section>

<section class="content">
  <div class="row">
     <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Admin user list</h3>
          </div>
          <div class="box-body">
            @if (count($user) > 0)
            <table id="admin-users" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>User Name</th>
                  <th>Email Id</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $user)
                <tr>
                  <td>{{ $user -> id }}</td>
                  <td>{{ $user -> user_name }}</td>
                  <td>{{ $user -> email }}</td>
                  <td>{{ $user -> password }}</td>
                  <td class="text-center">
                    <form action="/users/admin/{{ $user->id }}" method="post">                    
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach                       
              </tbody>
            </table>
            @else
              <div class="alert alert-danger">There are no admin users as of now.</div>
            @endif

          </div>
        </div>
      </div>
  </div>
</section>
<script>
  $(function () {
    $('#admin-users').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection()