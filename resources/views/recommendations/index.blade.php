@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Recommendation Results</h1>

    <div class="row mb-4">
        <!-- AHP Weights Section -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title">AHP Weights</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        @foreach($weights as $criteria => $weight)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ ucfirst($criteria) }}
                                <span class="badge bg-info rounded-pill">{{ number_format($weight, 4) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Chart.js AHP Weights -->
                    <div class="chart-container">
                        <canvas id="ahpWeightsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOPSIS Rankings Section -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h2 class="card-title">TOPSIS Rankings</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-4">
                        @foreach($results as $alternative => $score)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ ucfirst($alternative) }}
                                <span class="badge bg-success rounded-pill">{{ number_format($score, 4) }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Chart.js TOPSIS Rankings -->
                    <div class="chart-container">
                        <canvas id="topsisRankingsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <!-- Custom CSS for styling -->
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
        .card-header {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .list-group-item {
            border: none;
            border-bottom: 1px solid #dee2e6;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
    </style>
@endsection

@section('js')
    <script>
        // Data for AHP Weights Chart
        const ahpWeightsCtx = document.getElementById('ahpWeightsChart').getContext('2d');
        const ahpWeightsChart = new Chart(ahpWeightsCtx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($weights)),
                datasets: [{
                    label: 'AHP Weights',
                    data: @json(array_values($weights)),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(4);
                            }
                        }
                    }
                }
            }
        });

// Data for TOPSIS Rankings Chart
const topsisRankingsCtx = document.getElementById('topsisRankingsChart').getContext('2d');
const topsisRankingsChart = new Chart(topsisRankingsCtx, {
    type: 'line',
    data: {
        labels: @json(array_keys($results)),
        datasets: [{
            label: 'TOPSIS Rankings',
            data: @json(array_values($results)),
            borderColor: '#006400', // Dark Green
            backgroundColor: 'rgba(0, 100, 0, 0.2)', // Semi-transparent Dark Green
            borderWidth: 2,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Alternatives'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Ranking Score'
                }
            }
        },
        plugins: {
            legend: {
                position: 'top'
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(4);
                    }
                }
            }
        }
    }
});

    </script>
@endsection
