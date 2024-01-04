@extends('backend.layouts.app')

@section('title', 'Laporan Tahunan Dengan Total Rp.'.$penerimaan->sum('jumlah').',-')
@section('subTitle', 'Data Penerimaan Retribusi')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title col-3">
                    <small>Table @yield('subTitle')</small>
                </h3>
                @if (auth()->user()->upt_id == null )                    
                    <form action="" class="d-flex gap-2">
                        <select class="js-select2 form-select" id="val-select2" name="upt_id" data-placeholder="UPT" style="width: auto;">
                            <option></option>
                            @foreach ($upt as $item)                        
                                <option value="{{$item->id}}" @if (isset($_GET['upt_id'])) @if($_GET['upt_id'] == $item->id) selected @endif @endif>{{$item->nama}}</option>
                            @endforeach
                        </select>
                        <select class="js-select2 form-select" id="val-select4" name="tahun" data-placeholder="Tahun" style="width: 100px;" required>
                            <option></option>
                            @for ($i=2023; $i<2027 ; $i++)                        
                                <option value="{{$i}}" @if (isset($_GET['tahun'])) @if($_GET['tahun'] == $i) selected @endif @endif>{{$i}}</option>
                            @endfor
                        </select>
                        <button class="btn btn-sm btn-primary" type="submit">Lihat</button>
                    </form>
                    <a href="{{url('admin/laporan/tahunan')}}"><button class="btn btn-sm btn-info m-2 p-2">Reset</button></a>
                @else
                    <form action="" class="d-flex gap-2">
                        <select class="js-select2 form-select" id="val-select4" name="tahun" data-placeholder="Tahun" style="width: 100px;" required>
                            <option></option>
                            @for ($i=2023; $i<2027 ; $i++)                        
                                <option value="{{$i}}" @if (isset($_GET['tahun'])) @if($_GET['tahun'] == $i) selected @endif @endif>{{$i}}</option>
                            @endfor
                        </select>
                        <button class="btn btn-sm btn-primary" type="submit">Lihat</button>
                    </form>
                    <a href="{{url('admin/laporan/tahunan')}}"><button class="btn btn-sm btn-info m-2 p-2">Reset</button></a>                @endif
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>Nama UPT</th>
                            <th class="d-none d-sm-table-cell">Tanggal Penerimaan</th>
                            <th class="d-none d-sm-table-cell">Kode Rekening</th>
                            <th class="d-none d-sm-table-cell">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if (auth()->user()->upt_id == null)
                            @if (isset($_GET['upt_id']))
                                @foreach ($upt->where('id', $_GET['upt_id']) as $index => $data_upt)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $data_upt->nama }}</td>
                                    <td class="fw-semibold">{{ App\Models\Transaction\Penerimaan::total_retribusi($data_upt->id) }}</td>
                                </tr>                          
                                @endforeach
                            @else
                                @foreach ($penerimaan as $index => $data)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $data->upt->nama }}</td>
                                </tr>                          
                                @endforeach
                            @endif

                        @else
                            
                        @endif --}}
                        @forelse ($penerimaan as $index => $data)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $data->upt->nama }}</td>
                                <td class="d-none d-sm-table-cell">{{ $data->tgl_penerimaan }}</td>
                                <td class="d-none d-sm-table-cell">{{ $data->kode_rekening }}</td>
                                <td class="d-none d-sm-table-cell">@rp($data->jumlah)</td>
                            </tr>                            
                        @empty
                        @endforelse
                    </tbody>
                </table>
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
    {{-- <script type="text/javascript">
        jQuery(function() {
          jQuery('#val-select2').change(function() {
              this.form.submit();
          });
      });
    </script> --}}
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>Codebase.helpersOnLoad(['jq-select2']);</script>
@endpush
