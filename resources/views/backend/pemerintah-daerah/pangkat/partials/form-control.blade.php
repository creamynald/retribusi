<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tambah Data @yield('subTitle')</h3>
        <div class="block-options">
            <a href="{{ route('pangkat.index') }}" class="btn-block-option">
                <i class="fa fa-fw fa-reply"></i> Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="golongan">Golongan/Ruang</label>
                    <input type="text" class="form-control" id="golongan" name="golongan"
                        value="{{ old('golongan') ?? $data->golongan }}" placeholder="Golongan/Ruang (ex:IIIa)" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="pangkat">Pangkat</label>
                    <input type="text" class="form-control" id="pangkat" name="pangkat"
                        value="{{ old('pangkat') ?? $data->pangkat }}" placeholder="Pangkat">
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
