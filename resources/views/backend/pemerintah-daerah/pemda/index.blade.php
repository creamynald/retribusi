@extends('backend.layouts.app')

@section('title', 'Pemerintah Daerah')
@section('subTitle', 'Data Umum Pemerintah Daerah')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <form action="{{ route('pemda.store') }}" method="POST">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <small>@yield('subTitle')</small>
                    </h3>

                    <button type="submit" class="btn-block-option">
                        <i class="si si-link"></i> Sync Data
                    </button>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="nama_pemkab">Nama Pemerintah Daerah</label>
                                <input type="text" class="form-control" id="nama_pemkab" name="nama_pemkab"
                                    value="{{ old('nama_pemkab') ?? $data->nama_pemkab }}" placeholder="Pemerintah Daerah"
                                    autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label class="form-label" for="nama_instansi">Instansi</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                    value="{{ old('nama_instansi') ?? $data->nama_instansi }}" placeholder="Nama Instansi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="mb-4">
                                <label class="form-label" for="alamat">Alamat Instansi</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ old('alamat') ?? $data->alamat }}" placeholder="Jl. ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="no_telp">Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ old('no_telp') ?? $data->no_telp }}" placeholder="Telp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="kode_pos">Kode POS</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                    value="{{ old('kode_pos') ?? $data->kode_pos }}" placeholder="Kode POS">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="fax">FAX</label>
                                <input type="text" class="form-control" id="fax" name="fax"
                                    value="{{ old('fax') ?? $data->fax }}" placeholder="Fax">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="website">Telp</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    value="{{ old('website') ?? $data->website }}" placeholder="Telp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label class="form-label" for="target_retribusi_tahun_ini">Target Retribusi</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="target_retribusi_tahun_ini"
                                        name="target_retribusi_tahun_ini"
                                        value="{{ old('target_retribusi_tahun_ini') ?? $data->target_retribusi_tahun_ini }}"
                                        placeholder="Jumlah Setoran" onkeyup="this.value=addcommas(this.value);">
                                </div>
                                <small style="color: green;">*Tanda koma menunjukkan angka ribuan</small>
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

    <script type="text/javascript">
        function addcommas(x) {
            //remove commas
            retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

            //apply formatting
            return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
@endpush
