@extends('layouts.home')
@section('title_page','Tambah Data Santri/Pengurus')
@section('content')

    <form action="{{ route('santri.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="role">Tipe</label>
                        <select class="form-control select2 @error('types') is-invalid @enderror" id="types" name="types" required>
                            <option selected disabled>Pilih Tipe</option>
                            <option value="Pengurus">Pengurus</option>
                            <option value="Santri">Santri</option>
                        </select>

                        @error('types')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="pengurus">
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name">Nama </label>--}}
{{--                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">--}}

{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="birth_date">Tanggal Lahir </label>--}}
{{--                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}">--}}

{{--                            @error('birth_date')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="birth_place">Tempat Lahir</label>--}}
{{--                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}">--}}

{{--                            @error('birth_place')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="address">Alamat</label>--}}
{{--                            <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') }}</textarea>--}}

{{--                            @error('address')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="phone">No. HP</label>--}}
{{--                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">--}}

{{--                            @error('phone')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="photo">Photo</label>--}}
{{--                            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">--}}
{{--                            <span class="text-small text-danger font-italic">File extension only: jpg, jpeg, png | Max Upload Image is 2048 Kb</span>--}}

{{--                            @error('photo')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="santri">
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name">Nama Santri</label>--}}
{{--                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">--}}

{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="birth_date">Tanggal Lahir Santri</label>--}}
{{--                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}">--}}

{{--                            @error('birth_date')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="birth_place">Tempat Lahir Santri</label>--}}
{{--                            <input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}">--}}

{{--                            @error('birth_place')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="address">Alamat Santri</label>--}}
{{--                            <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address') }}</textarea>--}}

{{--                            @error('address')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="phone">No. HP Santri</label>--}}
{{--                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">--}}

{{--                            @error('phone')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="school_address_old">Alamat Asal Sekolah Santri</label>--}}
{{--                            <textarea class="form-control @error('school_address_old') is-invalid @enderror" name="school_address_old">{{ old('school_address_old') }}</textarea>--}}

{{--                            @error('school_address_old')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="school_current">Sekolah Sekarang Santri</label>--}}
{{--                            <input type="text" class="form-control @error('school_current') is-invalid @enderror" name="school_current" value="{{ old('school_current') }}">--}}

{{--                            @error('school_current')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="school_address_current">Alamat Sekolah Sekarang Santri</label>--}}
{{--                            <textarea class="form-control @error('school_address_current') is-invalid @enderror" name="school_address_current">{{ old('school_address_current') }}</textarea>--}}

{{--                            @error('school_address_current')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="father_name">Nama Ayah Santri</label>--}}
{{--                            <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}">--}}

{{--                            @error('father_name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="father_job">Pekerjaan Ayah Santri</label>--}}
{{--                            <input type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" value="{{ old('father_job') }}">--}}

{{--                            @error('father_job')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="entry_year">Tahun Masuk</label>--}}
{{--                            <input type="tel" class="form-control @error('entry_year') is-invalid @enderror" name="entry_year" value="{{ old('entry_year') }}">--}}

{{--                            @error('entry_year')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="mother_name">Nama Ibu Santri</label>--}}
{{--                            <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}">--}}

{{--                            @error('mother_name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="mother_job">Pekerjaan Ibu Santri</label>--}}
{{--                            <input type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" value="{{ old('mother_job') }}">--}}

{{--                            @error('mother_job')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="year_out">Tahun Keluar</label>--}}
{{--                            <input type="tel" class="form-control @error('year_out') is-invalid @enderror" name="year_out" value="{{ old('year_out') }}">--}}

{{--                            @error('year_out')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="parent_phone">No. HP Orang Tua Santri</label>--}}
{{--                            <input type="tel" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" value="{{ old('parent_phone') }}">--}}

{{--                            @error('parent_phone')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="photo">Photo</label>--}}
{{--                            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">--}}
{{--                            <span class="text-small text-danger font-italic">File extension only: jpg, jpeg, png | Max Upload Image is 2048 Kb</span>--}}

{{--                            @error('photo')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Tambah</button>
                <a href="{{ route('santri.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#types").on('change', function (event) {
                event.preventDefault()
                var types = $(this).val()
                if (types === 'Pengurus'){
                    $(".pengurus").append('<div class="row"> ' +
                        '<div class="col-sm"> ' +
                        '<div class="form-group"> ' +
                        '<label for="name">Nama </label> ' +
                        '<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required> ' +

                            @error('name')
                            '<span class="invalid-feedback" role="alert"> ' +
                                '<strong>{{ $message }}</strong> ' +
                            '</span> ' +
                            @enderror
                        '</div> ' +
                '</div> ' +
                    '<div class="col-sm"> ' +
                        '<div class="form-group"> ' +
                            '<label for="birth_date">Tanggal Lahir </label> ' +
                            '<input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required>' +

                            @error('birth_date')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                            @enderror
                        '</div>' +
                    '</div>' +
                    '<div class="col-sm">' +
                        '<div class="form-group">' +
                            '<label for="birth_place">Tempat Lahir</label>' +
                            '<input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" required>' +

                            @error('birth_place')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                            @enderror
                        '</div>' +
                    '</div>' +
                '</div>' +
                    '<div class="row">' +
                        '<div class="col-md">' +
                            '<div class="form-group">' +
                                '<label for="address">Alamat</label>' +
                                '<textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>' +

                                @error('address')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="phone">No. HP</label>' +
                                '<input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>' +

                            @error('phone')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="photo">Photo</label>' +
                                '<input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required>' +
                                    '<span class="text-small text-danger font-italic">File extension only: jpg, jpeg, png | Max Upload Image is 2048 Kb</span>' +

                                    @error('photo')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>')
                    $(".santri").empty()
                } else{
                    $(".pengurus").empty()
                    $(".santri").append(' <div class="row">' +
                        '<div class="col-sm">' +
                        '<div class="form-group">' +
                        '<label for="name">Nama Santri</label>' +
                        '<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>' +

                            @error('name')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                        @enderror
                    '</div>' +
                '</div>' +
                    '<div class="col-sm">' +
                        '<div class="form-group">' +
                            '<label for="birth_date">Tanggal Lahir Santri</label>' +
                            '<input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required>' +

                            @error('birth_date')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                            @enderror
                        '</div>' +
                    '</div>' +
                    '<div class="col-sm">' +
                        '<div class="form-group">' +
                            '<label for="birth_place">Tempat Lahir Santri</label>' +
                            '<input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" required>' +

                            @error('birth_place')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                            @enderror
                        '</div>' +
                    '</div>' +
                '</div>' +
                    '<div class="row">' +
                        '<div class="col-md">' +
                            '<div class="form-group">' +
                                '<label for="address">Alamat Santri</label>' +
                                '<textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>' +

                                @error('address')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="phone">No. HP Santri</label>' +
                                '<input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>' +

                            @error('phone')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="school_address_old">Alamat Asal Sekolah Santri</label>' +
                                '<textarea class="form-control @error('school_address_old') is-invalid @enderror" name="school_address_old" required>{{ old('school_address_old') }}</textarea>' +

                                @error('school_address_old')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="school_current">Sekolah Sekarang Santri</label>' +
                                '<input type="text" class="form-control @error('school_current') is-invalid @enderror" name="school_current" value="{{ old('school_current') }}" required>' +

                            @error('school_current')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="school_address_current">Alamat Sekolah Sekarang Santri</label>' +
                                '<textarea class="form-control @error('school_address_current') is-invalid @enderror" name="school_address_current" required>{{ old('school_address_current') }}</textarea>' +

                                @error('school_address_current')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="father_name">Nama Ayah Santri</label>' +
                                '<input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required>' +

                            @error('father_name')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="father_job">Pekerjaan Ayah Santri</label>' +
                                '<input type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" value="{{ old('father_job') }}" required>' +

                            @error('father_job')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="entry_year">Tahun Masuk</label>' +
                                '<input type="tel" class="form-control @error('entry_year') is-invalid @enderror" name="entry_year" value="{{ old('entry_year') }}" required>' +

                            @error('entry_year')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="mother_name">Nama Ibu Santri</label>' +
                                '<input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required>' +

                            @error('mother_name')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="mother_job">Pekerjaan Ibu Santri</label>' +
                                '<input type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" value="{{ old('mother_job') }}" required>' +

                            @error('mother_job')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="year_out">Tahun Keluar</label>' +
                                '<input type="tel" class="form-control @error('year_out') is-invalid @enderror" name="year_out" value="{{ old('year_out') }}" required>' +

                            @error('year_out')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="row">' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="parent_phone">No. HP Orang Tua Santri</label>' +
                                '<input type="tel" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" value="{{ old('parent_phone') }}" required>' +

                            @error('parent_phone')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm">' +
                            '<div class="form-group">' +
                                '<label for="photo">Photo</label>' +
                                '<input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">' +
                                    '<span class="text-small text-danger font-italic">File extension only: jpg, jpeg, png | Max Upload Image is 2048 Kb</span>' +

                                    @error('photo')
                            '<span class="invalid-feedback" role="alert">' +
                                '<strong>{{ $message }}</strong>' +
                            '</span>' +
                                @enderror
                            '</div>' +
                        '</div>' +
                    '</div>')
                }
            })
        })
    </script>
@endsection
