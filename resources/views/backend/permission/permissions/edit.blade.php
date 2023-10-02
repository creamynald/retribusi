@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Permissions')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        @include('backend.permission.permissions.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection