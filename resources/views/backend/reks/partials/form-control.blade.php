<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('register-rek.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm">
                <div class="mb-4">
                    <label class="form-label" for="nomor_rekening">Kode Rekening</label>
                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening"
                        value="{{ old('nomor_rekening') ?? $data->nomor_rekening }}" placeholder="Kode Rekening">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="nama_bank">Nama Bank</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank"
                        value="{{ old('nama_bank') ?? $data->nama_bank }}" placeholder="Nama Bank (ex:Bank Riau Kepri)" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="atas_nama">Atas Nama</label>
                    <input type="text" class="form-control" id="atas_nama" name="atas_nama"
                        value="{{ old('atas_nama') ?? $data->atas_nama }}" placeholder="Atas Nama">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>{{ $submit }}</button>
            </div>
        </div>
    </div>
</div>
