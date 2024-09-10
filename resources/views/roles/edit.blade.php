@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form for Editing Role -->
                <div class="card mt-4"> <!-- Added mt-4 class for top margin -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Edit Role</h4>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label"><strong>Name:</strong></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Role Name" value="{{ $role->name }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="permissions" class="form-label"><strong>Permissions:</strong></label>
                                        <br />
                                        @foreach ($permission as $value)
                                            <label>
                                                <input type="checkbox" name="permission[{{ $value->id }}]"
                                                    value="{{ $value->id }}" class="name"
                                                    {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                                {{ $value->name }}
                                            </label>
                                            <br />
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i
                                            class="fa-solid fa-floppy-disk"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
