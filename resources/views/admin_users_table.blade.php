@extends('components.admin_layout')
@section('title','Table - Admin Dashboard')
@section('data')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">The Latte Da Users Details Table.</p>

    <!-- Users Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Latte Da Users</h6>
            <div class="row">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <input class="form-control" type="file" name="import">
                    </div>
                    
                    <span style="display: flex">
                        <button type="submit" class="btn btn-success mt-2 mb-2 p-2">Import <i class="bi bi-file-earmark-arrow-down"></i></button>
                        <a href="{{ route('export') }}" class="btn btn-danger mt-2 mb-2 p-2 mx-2">Export <i class="bi bi-file-earmark-arrow-up"></i></a>
                    </span>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Operations</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>     
                                <td>{{$item['id']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['password']}}</td>
                                @if ($item['role_id'] == 1)
                                    <td>Admin</td>
                                @else
                                    <td>User</td>
                                @endif
                                <td><span><button data-id="{{$item['id']}}" class="btn btn-success">Edit</button> || <button class="btn btn-danger del_user_btn" data-id="{{$item['id']}}" >Delete</button></span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

