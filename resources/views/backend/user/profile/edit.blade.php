@extends('backend.layouts.app')

@section('title', 'User')
@section('subTitle', 'Profile')

@section('content')
    <div class="content">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-user-circle me-1 text-muted"></i> User Profile
                </h3>
            </div>
            <div class="block-content">
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="name"
                                    name="name" placeholder="Enter your name.." value="{{ auth()->user()->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email"
                                    name="email" placeholder="Enter your email.."
                                    value="{{ auth()->user()->email }}">
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-10 col-xl-6">
                                    <div class="push">
                                        <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="profile-settings-avatar" class="form-label">Choose
                                            new avatar</label>
                                        <input class="form-control" type="file" id="profile-settings-avatar"
                                            name="profile-settings-avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-asterisk me-1 text-muted"></i> Change Password
                </h3>
            </div>
            <div class="block-content">
                <form action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="mb-4">
                                <label class="form-label" for="password">New Password</label>
                                <input type="password" class="form-control form-control-lg"
                                    id="password" name="password">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password_confirmation">Confirm New
                                    Password</label>
                                <input type="password" class="form-control form-control-lg"
                                    id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->
    </div>
@endsection
