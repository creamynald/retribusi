@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end bg-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center ">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25 text-primary-lighter"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold text-white">@rp($target_retribusi_tahun_ini)</div>
                            <div class="fs-sm fw-semibold text-muted text-white-75">Target Pajak & Retribusi Tahun 2024</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end bg-success" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold text-white">@rp($jumlah_pendapatan_penerimaan_hari_ini)</div>
                            <div class="fs-sm fw-semibold text-muted text-white-75">Realisasi Pajak & Retribusi s/d hari ini
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-wallet fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold text-white">Rp. 0</div><br>
                            <div class="fs-sm fw-semibold text-muted text-white-75">Penerimaan Lainnya</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-rounded block-link-shadow text-end bg-info" href="javascript:void(0)">
                    <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                        <div class="d-none d-sm-block">
                            <i class="fa fa-users fa-2x opacity-25"></i>
                        </div>
                        <div>
                            <div class="fs-3 fw-semibold text-white">{{ $jmlh_pengguna }}</div><br>
                            <div class="fs-sm fw-semibold text-muted  text-white-75">Pengguna Aplikasi</div>
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
                @if (Auth::user()->hasRole('super admin|admin'))
                    <p>Hi <b>{{ Auth::user()->name }},</b> Anda login sebagai <b>Super Admin</b>. Anda dapat mengakses semua
                        menu yang ada di aplikasi ini.</p>
                @elseif(Auth::user()->hasRole('opd|upt'))
                    <p>Hi <b>{{ Auth::user()->name }},</b>
                        Anda login sebagai @if (Auth::user()->hasRole('opd'))
                            OPD
                        @else
                            UPT
                        @endif dengan email <b>{{ Auth::user()->email }}</b> <br> <i
                            class="fa fa-clock"></i>
                        @if ($cek_retribusi_hari_ini_per_user == false)
                            <span class="text-danger">Anda belum memasukkan data retribusi untuk hari ini.
                                Mohon
                                segera
                                lakukan penginputan data hingga pukul 24.00 WIB hari ini.</span>
                        @else
                            <span>Anda sudah memasukkan data retribusi untuk hari ini.
                                Terima
                                kasih
                                atas kerjasamanya.</span>
                        @endif
                @endif
            </div>
        </div>
    </div>
@endsection
