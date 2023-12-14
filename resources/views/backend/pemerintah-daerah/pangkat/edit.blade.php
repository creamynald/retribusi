@extends('backend.layouts.app')

@section('title', 'Pemerintah Daerah')
@section('subTitle', 'Pangkat')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('pangkat.update', $data) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('backend.pemerintah-daerah.pangkat.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection