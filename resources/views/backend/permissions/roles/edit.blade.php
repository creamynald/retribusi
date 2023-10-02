@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Roles')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')
        @include('backend.permissions.roles.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection