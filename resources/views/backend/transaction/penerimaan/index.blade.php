@extends('backend.layouts.app')

@section('title', 'Penerimaan')
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

                @if (auth()->user()->upt_id == null)
                <form action="" class="d-flex gap-2">
                    <select class="js-select2 form-select" id="val-select2" name="upt_id" data-placeholder="Pilih UPT.." style="width: auto;">
                        <option></option>
                        @foreach ($upt as $item)                        
                            <option value="{{$item->id}}" @if (isset($_GET['upt_id'])) @if($_GET['upt_id'] == $item->id) selected @endif @endif>{{$item->nama}}</option>
                        @endforeach
                    </select>
                </form>
                @else
                <a href="{{ route('penerimaan.create') }}" type="button" class="btn-block-option">
                    <i class="si si-plus"></i> Add Data
                </a>
                @endif
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th class="d-none d-sm-table-cell">Retribusi</th>
                            <th class="d-none d-sm-table-cell">Tanggal Penerimaan</th>
                            <th class="d-none d-sm-table-cell">Tanggal Penyetoran</th>
                            <th class="d-none d-sm-table-cell">Jumlah</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="text-center" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerimaan as $index => $data)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="d-none d-sm-table-cell">{{ $data->objekRetribusi->kode }} - <span style="font-weight: 800;">{{ $data->objekRetribusi->nama }}</span></td>
                                <td class="d-none d-sm-table-cell">{{ $data->tgl_penerimaan }}</td>
                                <td class="d-none d-sm-table-cell">{{ $data->tgl_penyetoran }}</td>
                                <td class="d-none d-sm-table-cell">@rp($data->jumlah)</td>
                                <td class="text-center">
                                    @if ($data->status == 'Belum Diverifikasi')
                                        <span class="badge bg-danger">Belum Diverifikasi</span>
                                    @else
                                        <span class="badge bg-success">Sudah Diverifikasi</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if (auth()->user()->upt_id != null)
                                        
                                    <a href="{{ route('penerimaan.edit', $data) }}" type="button"
                                        class="btn btn-sm btn-secondary" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form action="{{ route('penerimaan.destroy', $data) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-slideleft{{$data->id}}"><i class="fa fa-list"></i></button>
                                    @endif
                                </td>
                            </tr>

                            @if (auth()->user()->upt_id == null)    
                            <!-- Slide Left Modal -->
                            <div class="modal modal-lg fade" id="modal-slideleft{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-slideleft" role="document">
                                <div class="modal-content">
                                    <div class="block block-rounded shadow-none mb-0">
                                        <div class="block-header block-header-default">
                                            <h3 class="block-title">Retribusi Penerimaan</h3>
                                            <div class="block-options">
                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <div class="block-content fs-lg">
                                            <div class="row block-title">
                                                <div class="row d-flex">
                                                    <div class="col-6" style="font-weight: 900;">Jumlah Setoran</div>
                                                    <div class="col-6" style="font-weight: 900;">: @rp($data->jumlah)</div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-6">Kode Rekening</div>
                                                    <div class="col-6">: {{$data->objekRetribusi->kode}}</div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-6">Nama Rekening</div>
                                                    <div class="col-6">: {{$data->objekRetribusi->nama}}</div>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-6">Tanggal Penerimaan</div>
                                                    <div class="col-6">: {{\Carbon\carbon::parse($data->tgl_penerimaan)->format('d-m-Y')}}</div>
                                                </div>                                                
                                                <div class="row d-flex">
                                                    <div class="col-6">Tanggal Penyetoran</div>
                                                    <div class="col-6">: {{\Carbon\carbon::parse($data->tgl_penyetoran)->format('d-m-Y')}}</div>
                                                </div>
                                                <div class="col-12 mt-2 mb-2">
                                                    @php
                                                        $fileExtension = pathinfo(url('storage/'.$data->bukti_pembayaran), PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png']))
                                                        <img src="{{url('storage/'.$data->bukti_pembayaran)}}" alt="" class="img-fluid mx-auto d-block">
                                                    @elseif (strtolower($fileExtension) === 'pdf')
                                                        <iframe src ="{{ asset('/laraview/#../storage/'.$data->bukti_pembayaran) }}" class="col-12 mt-2 mb-2" style="height: 100vh"></iframe>
                                                    @else
                                                        <p>Jenis file tidak didukung.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{route('updateStatus')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="status" value="@if($data->status != 1){{'1'}}@else{{'Belum Diverifikasi'}}@endif" placeholder="Diverifikasi">
                                            <input type="hidden" name="id_penerimaan" value="{{$data->id}}">
                                            <div class="block-content block-content-full block-content-sm text-end border-top">
                                                <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn @if($data->status == 1){{'btn-danger'}}@else{{'btn-success'}}@endif" data-bs-dismiss="modal">@if($data->status == 1){{'Batalkan Verifikasi'}}@else{{'Verifikasi'}}@endif</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- END Slide Left Modal -->
                            @endif
                            
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
    <script type="text/javascript">
        jQuery(function() {
          jQuery('#val-select2').change(function() {
              this.form.submit();
          });
      });
    </script>
    <!-- Page JS Helpers (Select2 plugin) -->
    <script>Codebase.helpersOnLoad(['jq-select2']);</script>
@endpush
