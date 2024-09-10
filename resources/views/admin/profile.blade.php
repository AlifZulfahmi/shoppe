@extends('layouts.adminApp')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i
                            class="bx bx-user me-1"></i>
                        Account</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i
                            class="bx bx-bell me-1"></i>
                        Notifications</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i
                            class="bx bx-link-alt me-1"></i> Connections</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="card mb-4">
                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('users.updateProfile', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if ($user->image)
                                    <img src="{{ asset('storage/images/' . $user->image) }}" alt="user-avatar"
                                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    @endif
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="image" class="account-file-input"
                                                hidden accept="image/png, image/jpg" />
                                        </label>
                                        <button type="button"
                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>

                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="john.doe@example.com" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input class="form-control" type="tel" id="phone_number" name="phone_number"
                                        value="{{ $user->phone_number }}" placeholder="+62 812-3456-7890"
                                        pattern="^\+62\s?8\d{2,3}[-\s]?\d{3,4}[-\s]?\d{3,4}$"
                                        title="Format nomor telepon harus sesuai dengan format Indonesia, misalnya +62 812-3456-7890."
                                        required />
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                        value="{{ $user->address }}" placeholder="Address" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="" disabled>Select Gender</option>
                                        <option value="male" {{ $user->gender == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="female" {{ $user->gender == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Leave blank to keep current password" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input class="form-control" type="password" id="confirm-password"
                                        name="confirm-password" />
                                </div>
                                <div class="form-group d-none">
                                    <select name="roles[]" class="form-control" multiple="multiple">
                                        @foreach ($roles as $value => $label)
                                        <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <a href="/home" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                        </form>
                        <!-- /Account -->
                    </div>
                    <div class="card">
                        <h5 class="card-header">Delete Account</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your
                                        account?</h6>
                                    <p class="mb-0">Once you delete your account, there is no going back. Please be
                                        certain.
                                    </p>
                                </div>
                            </div>
                            <form id="formAccountDeactivation" action="{{ route('users.destroy', Auth::id()) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="accountActivation"
                                        id="accountActivation" />
                                    <label class="form-check-label" for="accountActivation">I confirm my account
                                        deactivation</label>
                                </div>
                                <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                    Account</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">notif</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">contact</div>
            </div>

        </div>
    </div>
</div>
@endsection