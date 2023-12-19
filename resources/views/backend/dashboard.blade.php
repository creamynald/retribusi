@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">Rp. 32.000.000</div>
                            <div class="fs-sm fw-semibold text-muted">Target Pajak & Retribusi Tahun 2023</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">Rp. {{ $jumlah_pendapatan_penerimaan_hari_ini }}</div>
                            <div class="fs-sm fw-semibold text-muted">Realiassi Pajak & Retribusi s/d hari ini</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">Rp. 0</div><br>
                            <div class="fs-sm fw-semibold text-muted">Penerimaan Lainnya</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-users fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold">{{ $jmlh_pengguna }}</div><br>
                            <div class="fs-sm fw-semibold text-muted">Pengguna Aplikasi</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Catatan</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="pinned_toggle">
                        <i class="si si-pin"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                        data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option"
                        data-action="content_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                @if ($cek_retribusi_hari_ini == 0)
                    {
                    <p>Hi <b>{{ Auth::user()->name }}</b>, anda belum mengimput data retribusi hari ini, segera lakukan
                        pengimputan
                        data s.d jam 24.00 WIB hari ini</p>
                    }
                @else
                    <p>Hi <b>{{ Auth::user()->name }}</b>, anda sudah mengimput data retribusi hari ini, terima kasih</p>
                @endif
            </div>
        </div>
    </div>
@endsection
