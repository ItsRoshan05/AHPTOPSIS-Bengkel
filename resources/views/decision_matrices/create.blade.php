@extends('layouts.app')

@section('content')
    <h1>Create Decision Matrix</h1>

    <form action="{{ route('decision-matrices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="alternative">Alternative:</label>
            <input type="text" name="alternative" id="alternative" class="form-control" value="{{ old('alternative') }}" required>
            @error('alternative')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga (3.Sangat Mahal 5.Mahal 7.Cukup Mahal 9.Tidak Mahal
            ): </label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" placeholder="" required>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ketersediaan_pelayanan">Ketersediaan Pelayanan (3.Kurang Lengkap 5.Cukup Lengkap 7.Lengkap 9.Sangat Lengkap):</label>
            <input type="number" name="ketersediaan_pelayanan" id="ketersediaan_pelayanan" class="form-control" value="{{ old('ketersediaan_pelayanan') }}" required>
            @error('ketersediaan_pelayanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fasilitas_ruang_tunggu">Fasilitas Ruang Tunggu (3.Tidak Nyaman 5.Cukup Nyaman 7.Nyaman 9.Sangat Nyaman):</label>
            <input type="number" name="fasilitas_ruang_tunggu" id="fasilitas_ruang_tunggu" class="form-control" value="{{ old('fasilitas_ruang_tunggu') }}" required>
            @error('fasilitas_ruang_tunggu')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kualitas_pelayanan">Kualitas Pelayanan (3.Kurang Bagus 5.Cukup Bagus 7.Bagus 9.Sangat Bagus):</label>
            <input type="number" name="kualitas_pelayanan" id="kualitas_pelayanan" class="form-control" value="{{ old('kualitas_pelayanan') }}" required>
            @error('kualitas_pelayanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}">
            @error('latitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}">
            @error('longitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
