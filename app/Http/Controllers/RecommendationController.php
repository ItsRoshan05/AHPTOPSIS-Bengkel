<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PairwiseComparisonMatrix;
use App\Models\DecisionMatrix;

class RecommendationController extends Controller
{
    public function index()
    {
        // Ambil data matriks perbandingan berpasangan
        $matrix = PairwiseComparisonMatrix::all();
        $criteria = $matrix->pluck('criteria_1')->unique();
        $criteriaArray = $criteria->toArray();
        
        $numCriteria = count($criteriaArray);
        
        $comparisonMatrix = [];
        $normalizedMatrix = [];
        $weights = [];

        // Membentuk matriks perbandingan
        foreach ($criteriaArray as $criterion1) {
            foreach ($criteriaArray as $criterion2) {
                if ($criterion1 === $criterion2) {
                    $comparisonMatrix[$criterion1][$criterion2] = 1;
                } else {
                    $pair = $matrix->where('criteria_1', $criterion1)->where('criteria_2', $criterion2)->first();
                    $value = $pair ? $pair->value : 1 / ($matrix->where('criteria_1', $criterion2)->where('criteria_2', $criterion1)->first()->value ?? 1);
                    $comparisonMatrix[$criterion1][$criterion2] = $value;
                }
            }
        }

        // Normalisasi Matriks
        foreach ($criteriaArray as $criterion1) {
            $sumColumn = array_sum(array_column($comparisonMatrix, $criterion1));
            foreach ($criteriaArray as $criterion2) {
                $normalizedMatrix[$criterion1][$criterion2] = $sumColumn != 0 ? $comparisonMatrix[$criterion1][$criterion2] / $sumColumn : 0;
            }
        }

        // Hitung Bobot
        foreach ($criteriaArray as $criterion) {
            $weights[$criterion] = array_sum($normalizedMatrix[$criterion]) / $numCriteria;
        }

        // Normalisasi bobot
        $totalWeight = array_sum($weights);
        foreach ($weights as $key => $weight) {
            $weights[$key] = $totalWeight != 0 ? $weight / $totalWeight : 0;
        }

        // Ambil data matriks keputusan
        $decisionMatrix = DecisionMatrix::all();
        $criteria = ['harga', 'ketersediaan_pelayanan', 'fasilitas_ruang_tunggu', 'kualitas_pelayanan'];
        $results = [];

        // Normalisasi Matriks Keputusan
        $normalizedDecisionMatrix = [];
        foreach ($criteria as $criterion) {
            $sumSquares = $decisionMatrix->sum(fn($row) => $row->$criterion ** 2);
            $rootSumSquares = sqrt($sumSquares);

            if ($rootSumSquares == 0) {
                $rootSumSquares = 1; // Untuk menghindari pembagian dengan nol
            }

            foreach ($decisionMatrix as $index => $row) {
                $normalizedDecisionMatrix[$index][$criterion] = $row->$criterion / $rootSumSquares;
            }
        }

        // Normalisasi Matriks Keputusan dengan Bobot Kriteria
        foreach ($decisionMatrix as $index => $row) {
            foreach ($criteria as $criterion) {
                $weight = $weights[$criterion] ?? 0;
                $weight = $weight == 0 ? 1 : $weight; // Untuk menghindari pembagian dengan nol
                $row->$criterion = sqrt( $normalizedDecisionMatrix[$index][$criterion] * $weight);
            }
        }

        // Hitung Preferensi Terbaik dan Terburuk
        $idealBest = [];
        $idealWorst = [];
        foreach ($criteria as $criterion) {
            $idealBest[$criterion] = $decisionMatrix->max($criterion);
            $idealWorst[$criterion] = $decisionMatrix->min($criterion);
        }

        // Menghitung jarak solusi ideal positif dan negatif
        foreach ($decisionMatrix as $row) {
            $distanceBest = 0;
            $distanceWorst = 0;
            foreach ($criteria as $criterion) {
                $distanceBest += ($row->$criterion - $idealBest[$criterion]) ** 2;
                $distanceWorst += ($row->$criterion - $idealWorst[$criterion]) ** 2;
            }
            $distanceBest = sqrt($distanceBest);
            $distanceWorst = sqrt($distanceWorst);
            $results[$row->alternative] = $distanceWorst / ($distanceBest + $distanceWorst);
        }

        // Urutkan hasil berdasarkan nilai TOPSIS
        arsort($results);
        
        return view('recommendations.index', compact('weights', 'results'));
    }
}
