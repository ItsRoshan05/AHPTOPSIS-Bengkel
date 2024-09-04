<?php
namespace App\Services;

use App\Models\DecisionMatrix;

class TOPSISService
{
    public function calculateRanking()
    {
        $matrix = DecisionMatrix::all();
        $criteria = ['harga', 'ketersediaan_pelayanan', 'fasilitas_ruang_tunggu', 'kualitas_pelayanan'];
        $results = [];

        // Normalisasi Matriks Keputusan
        foreach ($matrix as $row) {
            $norm = 0;
            foreach ($criteria as $criterion) {
                $norm += $row->$criterion ** 2;
            }
            $norm = sqrt($norm);
            foreach ($criteria as $criterion) {
                $row->$criterion /= $norm;
            }
        }

        // Hitung Preferensi Terbaik dan Terburuk
        $idealBest = [];
        $idealWorst = [];
        foreach ($criteria as $criterion) {
            $idealBest[$criterion] = $matrix->max($criterion);
            $idealWorst[$criterion] = $matrix->min($criterion);
        }

        foreach ($matrix as $row) {
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

        arsort($results);
        return $results;
    }
}
