@extends('backend.layouts.app')

@section('title', 'Jenis Pajak Daerah')
@section('subTitle', 'Objek Retribusi')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <form action="{{ route('objek-retribusi.update', $data) }}" method="POST">
            @csrf
            @method('PUT')
            @include('backend.jenPajDae.objek.partials.form-control', ['submit' => 'Simpan'])
        </form>
        <!-- END Dynamic Table Full -->
    </div>
@endsection