<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Update Password</h5>
                <div class="card-body">
                    <!-- Display Flash Messages -->
                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">Current Password</label>
                            <input class="form-control" type="password" id="update_password_current_password"
                                name="current_password" autocomplete="current-password" />
                            @error('current_password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">New Password</label>
                            <input class="form-control" type="password" id="update_password_password" name="password"
                                autocomplete="new-password" />
                            @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">Confirm
                                Password</label>
                            <input class="form-control" type="password" id="update_password_password_confirmation"
                                name="password_confirmation" autocomplete="new-password" />
                            @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a href="/home" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>

                    @if (session('status') === 'password-updated')
                    <div class="mt-3 alert alert-success">
                        <p>{{ __('Password updated successfully.') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>