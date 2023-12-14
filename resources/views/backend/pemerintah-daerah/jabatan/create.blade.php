@extends('backend.layouts.app')

@section('title', 'Pemerintah Daerah')
@section('subTitle', 'Pangkat')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        @include('backend.pemerintah-daerah.jabatan.partials.form-control', ['submit' => 'Simpan'])
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection