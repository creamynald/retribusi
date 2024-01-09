@extends('backend.layouts.app')

@section('title', 'Jenis Pajak Daerah')
@section('subTitle', 'Retribusi')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <form action="{{ route('retribusi.store') }}" method="POST">
            @csrf
            @include('backend.jenPajDae.retribusi.partials.form-control', ['submit' => 'Simpan'])
        </form>
        <!-- END Dynamic Table Full -->
    </div>
@endsection