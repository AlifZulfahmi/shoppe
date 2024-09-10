@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!-- Card Header -->
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Show User</h4>
                        <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <!-- User Details -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label"><strong>Name:</strong></label>
                                    <p class="form-control-plaintext">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label"><strong>Email:</strong></label>
                                    <p class="form-control-plaintext">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="roles" class="form-label"><strong>Roles:</strong></label>
                                    <div>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $role)
                                                <span class="badge bg-label-primary">{{ $role }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge badge-secondary">No Roles Assigned</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
