@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Roles')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        @include('backend.permission.roles.partials.form-control', ['submit' => 'Create'])
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection