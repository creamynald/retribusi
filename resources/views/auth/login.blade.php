@extends('layouts.app')

@section('content')
<form class="js-validation-signin" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="block block-themed block-rounded block-fx-shadow">
        <div class="block-header bg-gd-dusk">
            <h3 class="block-title">Login/masuk</h3>
        </div>
        <div class="block-content">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username">
                <label class="form-label" for="email">Email Address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password">
                <label class="form-label" for="password">Password</label>
            </div>
            <div class="row">
                <div class="col-sm-6 d-sm-flex align-items-center push">
                </div>
                <div class="col-sm-6 text-sm-end push">
                    <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                        Masuk
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection