@extends('layouts.adminApp')

@section('content')
    <div class="container-fluid">
        <!-- Card Wrapper -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <!-- Form Header -->
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Create New User</h4>
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i>
                            Back</a>
                    </div>
                    <div class="card-body">
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

                        <!-- Form for Creating User -->
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="name" class="form-label"><strong>Name:</strong></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label"><strong>Email:</strong></label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="password" class="form-label"><strong>Password:</strong></label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="confirm-password" class="form-label"><strong>Confirm
                                                Password:</strong></label>
                                        <input type="password" id="confirm-password" name="confirm-password"
                                            class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="roles" class="form-label"><strong>Role:</strong></label>
                                        <select id="roles" name="roles[]" class="form-control" multiple="multiple">
                                            @foreach ($roles as $value => $label)
                                                <option value="{{ $value }}">
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3"><i
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
