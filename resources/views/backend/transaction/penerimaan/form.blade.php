@extends('backend.layouts.app')

@section('title', 'Penerimaan')
@section('subTitle', 'Penerimaan Retribusi')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        {{-- @php
        dd(Request::segment(5))
    @endphp --}}
        <!-- Dynamic Table Full -->
        {{-- <form action="{{ route('penerimaan.store') }}" method="POST" enctype="multipart/form-data"> --}}
        @if (Request::segment(5) == 'edit')
            <form action="{{ route('penerimaan.update', $penerimaan->id) }}" method="POST" enctype="multipart/form-data">
            @else
                <form action="{{ route('penerimaan.store') }}" method="POST" enctype="multipart/form-data">
        @endif
        @csrf
        @if (Request::segment(5) == 'edit')
            @method('put')
        @endif
        {{-- UPT ID untuk kebutuhan request di controller saat melakukan penyimpanan --}}
        <input type="hidden" name="upt_id" id="" value="{{ Auth::user()->upt_id }}">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Form @yield('subTitle')</h3>
                <div class="block-options">
                    <a href="{{ route('penerimaan.index') }}" class="btn-block-option">Kembali <i
                            class="fa fa-fw fa-reply"></i></a>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-4">
                            <label class="form-label" for="periode">Objek Retribusi</label>
                            <select class="js-select2 form-select" id="val-select2" name="objek_retribusi_id" data-placeholder="Pilih Objek Retribusi...">
                                <option></option>
                                @foreach ($objek_retribusi as $item)                        
                                    <option value="{{$item->id}}" @selected(old('objek_retribusi_id') == $item) @if ($item->id == $penerimaan->objek_retribusi_id)
                                        selected
                                    @endif>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="kode_rekening">Kode Rekening</label>
                            <input type="text" class="form-control" id="kode_rekening" name="kode_rekening"
                                value="{{ old('kode_rekening') ?? $penerimaan->kode_rekening }}" autofocus
                                placeholder="Kode Rekening">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="nama_rekening">Nama Rekening</label>
                            <input type="text" class="form-control" id="nama_rekening" name="nama_rekening"
                                placeholder="Nama Rekening"
                                value="{{ old('nama_rekening') ?? $penerimaan->nama_rekening }}">
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="tgl_penerimaan">Tanggal Penerimaan</label>
                            <input type="text" class="js-flatpickr form-control" id="tgl_penerimaan"
                                name="tgl_penerimaan" value="{{ old('tgl_penerimaan') ?? $penerimaan->tgl_penerimaan }}"
                                autofocus placeholder="Tanggal Penerimaan">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="tgl_penyetoran">Tanggal Penyetoran</label>
                            <input type="text" class="js-flatpickr form-control" id="tgl_penyetoran"
                                name="tgl_penyetoran" placeholder="Tanggal Penyetoran"
                                value="{{ old('tgl_penyetoran') ?? date("Y-m-d") }}" style="pointer-events: none; opacity: 80%;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="jumlah">Jumlah Setoran</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                    value="{{ old('jumlah') ?? $penerimaan->jumlah }}" autofocus
                                    placeholder="Jumlah Setoran" onkeyup="this.value=addcommas(this.value);">
                            </div>
                            <small style="color: green;">*Tanda koma menunjukkan angka ribuan</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label class="form-label" for="bukti_pembayaran">Bukti Penyetoran</label>
                            <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                                placeholder="Bukti Pembayaran">
                        </div>
                        <input type="text" value="{{$penerimaan->bukti_pembayaran}}" name="old_file">
                    </div>
                </div>
            </div>

            <div class="block-content">
                <button type="submit" class="btn btn-primary mb-4">
                    <i class="fa fa-fw fa-save opacity-50"></i> Simpan
                </button>
            </div>

        </div>
        </form>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('css')
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>Codebase.helpersOnLoad(['jq-select2']);</script>
    <script>
        Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider',
            'jq-masked-inputs', 'jq-pw-strength'
        ]);
    </script>

    <script type="text/javascript">
        function addcommas(x) {
            //remove commas
            retVal = x ? parseFloat(x.replace(/,/g, '')) : 0;

            //apply formatting
            return retVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
@endpush
