@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!-- Form Header -->
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Show Role</h4>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label"><strong>Name</strong></label>
                                    <p class="form-control-plaintext">{{ $role->name }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="permissions" class="form-label"><strong>Permissions:</strong></label>
                                    <div>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <span class="badge bg-success">{{ $v->name }}</span>
                                            @endforeach
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
