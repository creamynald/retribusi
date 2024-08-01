@extends('backend.layouts.app')

@section('title', 'Laporan')
@section('subTitle', 'Hasil Retribusi Daerah')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title col-3">
                    <small>Table @yield('subTitle')</small>
                </h3>
                <button type="submit" class="btn btn-sm btn-primary ms-2">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </div>
            <div class="block-content block-content-full">

                <!-- Header -->
                <p class="text-muted text-center" style="text-transform: uppercase; font-weight: 800;">
                    Target dan Realisasi<br>
                    Penerimaan Pendapatan Daerah<br>
                    Kabupaten Bengkalis Tahun Anggaran 2024
                </p>
                <!-- END Header -->

                <!-- Table -->
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 60px;">No</th>
                                <th class="text-center" style="width: 90px;">Ayat</th>
                                <th class="text-center">Uraian</th>
                                <th class="text-end">Anggaran/Target Perubahan</th>
                                <th class="text-end">Realisasi s.d hari ini</th>
                                <th class="text-end">Prosentase <br> %</th>
                                <th class="text-end">Kurang/Lebih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-info" style="font-weight: 800;">
                                <td class="text-center"></td>
                                <td class="text-left">4.1.02</td>
                                <td>
                                    <p class="fw-semibold mb-1">Hasil Retribusi Daerah</p>
                                </td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                            </tr>
                            @foreach ($datas as $index => $retribusi)
                                <tr class="table-info" style="font-weight: 800;">
                                    <td class="text-center"></td>
                                    <td class="text-left">{{ $retribusi->kode }}</td>
                                    <td>
                                        <p class="fw-semibold mb-1">{{ $retribusi->nama }}</p>
                                    </td>
                                    <td class="text-end"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end"></td>
                                    <td class="text-end"></td>
                                </tr>
                                @foreach ($retribusi->objekRetribusi as $objek)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-left">{{ $objek->kode }}</td>
                                        <td>
                                            <p class="fw-semibold mb-1">{{ $objek->nama }}</p>
                                        </td>
                                        <td class="text-end">@rp($objek->target)</td>
                                        <td class="text-end">@rp($retribusi->jumlah)</td>
                                        <td class="text-end"></td>
                                        <td class="text-end"></td>
                                    </tr>
                                    @foreach ($objek->rincianObjek as $rincian)
                                        @foreach ($rincian->penerimaans as $retribusi)
                                            <tr>
                                                <td class="text-center"></td>
                                                <td class="text-left">{{ $rincian->kode }}</td>
                                                <td>
                                                    <p class="fw-semibold mb-1">{{ $rincian->nama }}</p>
                                                </td>
                                                <td class="text-end">@rp($rincian->target)</td>
                                                <td class="text-end">@rp($retribusi->jumlah)</td>
                                                <td class="text-end">{{ number_format(($retribusi->jumlah/$rincian->target) * 100, 2)}}%</td>
                                                <td class="text-end">@rp($rincian->target - $retribusi->jumlah)</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                            <tr class="table-info">
                                <td colspan="3" class="fw-bold text-uppercase text-end">Jumlah Hasil Retribusi Daerah
                                </td>
                                <td class="fw-bold text-end"></td>
                                <td class="fw-bold text-end">@rp($total_retribusi_tahun_ini)</td>
                                <td class="fw-bold text-end"></td>
                                <td class="fw-bold text-end"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END Table -->

                <!-- Footer -->
                <p class="text-muted text-center">
                    <em>Halaman ini dicetak pada tanggal {{ $getTanggalSekarang }}</em>
                </p>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

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
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('#val-select2').change(function() {
                this.form.submit();
            });
        });
    </script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>
        Codebase.helpersOnLoad(['jq-select2']);
    </script>
@endpush
