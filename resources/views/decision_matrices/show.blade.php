@extends('layouts.app')

@section('css')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #mapid { height: 400px; }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $decisionMatrix->alternative }}</h1>
        <div class="card">
            <center>
                <img src="{{ $decisionMatrix->image ? asset('storage/images/' . $decisionMatrix->image) : 'https://via.placeholder.com/150' }}" class="card-img-top w-50 h-50" alt="Image">
            </center>
            <div class="card-body">
                <p><strong>Harga:</strong> {{ $decisionMatrix->harga }}</p>
                <p><strong>Ketersediaan Pelayanan:</strong> {{ $decisionMatrix->ketersediaan_pelayanan }}</p>
                <p><strong>Fasilitas Ruang Tunggu:</strong> {{ $decisionMatrix->fasilitas_ruang_tunggu }}</p>
                <p><strong>Kualitas Pelayanan:</strong> {{ $decisionMatrix->kualitas_pelayanan }}</p>
                <p><strong>Address:</strong> {{ $decisionMatrix->address }}</p>
                <div id="mapid"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('mapid').setView([{{ $decisionMatrix->latitude }}, {{ $decisionMatrix->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.marker([{{ $decisionMatrix->latitude }}, {{ $decisionMatrix->longitude }}]).addTo(map)
            .bindPopup('{{ $decisionMatrix->alternative }}')
            .openPopup();
    </script>
@endsection
