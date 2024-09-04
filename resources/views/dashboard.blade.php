@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            @foreach ($matrices as $matrix)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $matrix->image ? asset('storage/images/' . $matrix->image) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $matrix->alternative }}</h5>
                            <p class="card-text">Harga: {{ $matrix->harga }}</p>
                            <p class="card-text">Ketersediaan Pelayanan: {{ $matrix->ketersediaan_pelayanan }}</p>
                            <p class="card-text">Fasilitas Ruang Tunggu: {{ $matrix->fasilitas_ruang_tunggu }}</p>
                            <p class="card-text">Kualitas Pelayanan: {{ $matrix->kualitas_pelayanan }}</p>
                            <a href="{{ route('decision-matrices.show', $matrix->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

