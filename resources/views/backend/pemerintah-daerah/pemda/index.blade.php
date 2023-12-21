@extends('backend.layouts.app')

@section('title', 'Pemerintah Daerah')
@section('subTitle', 'Data Umum Pemerintah Daerah')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <form action="{{ route('assignable.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <small>@yield('subTitle')</small>
                    </h3>

                    <button type="submit" class="btn-block-option">
                        <i class="si si-link"></i> Sync Permission
                    </button>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-4">
                                <label class="form-label" for="nama">Nama Pemerintah Daerah</label>
                                <input type="text" class="form-control" id="nama" name="nama_pemda"
                                    value="{{ old('nama_pemda') ?? $data->nama_pemda }}" placeholder="Pemerintah Daerah"
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="nama">Ibu Kota Provinsi</label>
                                <input type="text" class="form-control" id="nama" name="nama_ibu_kota"
                                    value="{{ old('nama_ibu_kota') ?? $data->nama_ibu_kota }}" placeholder="Ibu Kota"
                                    autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-4">
                                <label class="form-label" for="nama">Nama Pemerintah Daerah</label>
                                <input type="text" class="form-control" id="nama" name="nama_pemda"
                                    value="{{ old('nama_pemda') ?? $data->nama_pemda }}" placeholder="Pemerintah Daerah"
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="nama">Ibu Kota Provinsi</label>
                                <input type="text" class="form-control" id="nama" name="nama_ibu_kota"
                                    value="{{ old('nama_ibu_kota') ?? $data->nama_ibu_kota }}" placeholder="Ibu Kota"
                                    autofocus>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider',
            'jq-masked-inputs', 'jq-pw-strength'
        ]);
    </script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endpush
