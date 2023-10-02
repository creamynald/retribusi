@extends('backend.layouts.app')

@section('title', 'Role & Permission')
@section('subTitle', 'Permissions')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        @include('backend.permission.permissions.partials.form-control', ['submit' => 'Create'])
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection