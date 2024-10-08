@extends('layouts.adminApp')

@section('content')
<div class="container-fluid">
    <!-- Card Wrapper -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Pengguna</h4>
            <!-- Card Header -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Users Management</h2>
                    <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New
                        User</a>
                </div>
            </div>
            <!-- Session Success Message -->
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <!-- Card Body with Data Table -->
            <div class="card">
                <div class="card-body">
                    <table id="usersTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                    <label class="badge bg-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->id) }}"><i
                                            class="fa-solid fa-list"></i> Show</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination Links -->
{!! $data->links('pagination::bootstrap-5') !!}
@endsection

@section('scripts')
<!-- Include DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#usersTable').DataTable({
        "searching": true, // Enable search
        "paging": true, // Enable pagination
        "info": true // Show info text
    });
});
</script>
@endsection