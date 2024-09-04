<?php
namespace App\Services;

use App\Models\PairwiseComparisonMatrix;

class AHPService
{
    public function calculateWeights()
    {
        $matrix = PairwiseComparisonMatrix::all();
        $criteria = $matrix->pluck('criteria_1')->unique();
        $weights = [];

        foreach ($criteria as $criterion) {
            $total = 0;
            foreach ($criteria as $comparison) {
                $pair = $matrix->where('criteria_1', $criterion)->where('criteria_2', $comparison)->first();
                $total += $pair ? $pair->value : 1;
            }
            $weights[$criterion] = 1 / $total;
        }

        $sum = array_sum($weights);
        return array_map(fn($weight) => $weight / $sum, $weights);
    }
}
