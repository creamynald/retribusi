@extends('backend.layouts.app')

@section('title', 'Pemerintah Daerah')
@section('subTitle', 'Organisasi Perangkat Daerah')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('opd.store') }}" method="POST">
        @csrf
        @include('backend.pemerintah-daerah.opd.partials.form-control', ['submit' => 'Simpan'])
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection