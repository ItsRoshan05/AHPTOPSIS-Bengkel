@extends('layouts.app')

@section('content')
    <h1>Edit Decision Matrix</h1>

    <form action="{{ route('decision-matrices.update', $decisionMatrix->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="alternative">Alternative:</label>
            <input type="text" name="alternative" id="alternative" class="form-control" value="{{ old('alternative', $decisionMatrix->alternative) }}" required>
            @error('alternative')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $decisionMatrix->harga) }}" required>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ketersediaan_pelayanan">Ketersediaan Pelayanan:</label>
            <input type="number" name="ketersediaan_pelayanan" id="ketersediaan_pelayanan" class="form-control" value="{{ old('ketersediaan_pelayanan', $decisionMatrix->ketersediaan_pelayanan) }}" required>
            @error('ketersediaan_pelayanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fasilitas_ruang_tunggu">Fasilitas Ruang Tunggu:</label>
            <input type="number" name="fasilitas_ruang_tunggu" id="fasilitas_ruang_tunggu" class="form-control" value="{{ old('fasilitas_ruang_tunggu', $decisionMatrix->fasilitas_ruang_tunggu) }}" required>
            @error('fasilitas_ruang_tunggu')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kualitas_pelayanan">Kualitas Pelayanan:</label>
            <input type="number" name="kualitas_pelayanan" id="kualitas_pelayanan" class="form-control" value="{{ old('kualitas_pelayanan', $decisionMatrix->kualitas_pelayanan) }}" required>
            @error('kualitas_pelayanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            @if ($decisionMatrix->image)
                <div>
                    <img src="{{ asset('storage/' . $decisionMatrix->image) }}" alt="Image" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $decisionMatrix->address) }}">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $decisionMatrix->latitude) }}">
            @error('latitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $decisionMatrix->longitude) }}">
            @error('longitude')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
