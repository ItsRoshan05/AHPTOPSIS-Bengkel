<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PairwiseComparisonMatrix;

class PairwiseComparisonMatrixSeeder extends Seeder
{
    public function run()
    {
        PairwiseComparisonMatrix::insert([
            ['criteria_1' => 'Harga', 'criteria_2' => 'Harga', 'value' => 1.000],
            ['criteria_1' => 'Harga', 'criteria_2' => 'Ketersediaan Pelayanan', 'value' => 1.000],
            ['criteria_1' => 'Harga', 'criteria_2' => 'Fasilitas Ruang Tunggu', 'value' => 0.333],
            ['criteria_1' => 'Harga', 'criteria_2' => 'Kualitas Pelayanan', 'value' => 0.333],

            ['criteria_1' => 'Ketersediaan Pelayanan', 'criteria_2' => 'Harga', 'value' => 1.000],
            ['criteria_1' => 'Ketersediaan Pelayanan', 'criteria_2' => 'Ketersediaan Pelayanan', 'value' => 1.000],
            ['criteria_1' => 'Ketersediaan Pelayanan', 'criteria_2' => 'Fasilitas Ruang Tunggu', 'value' => 0.333],
            ['criteria_1' => 'Ketersediaan Pelayanan', 'criteria_2' => 'Kualitas Pelayanan', 'value' => 0.333],

            ['criteria_1' => 'Fasilitas Ruang Tunggu', 'criteria_2' => 'Harga', 'value' => 3.000],
            ['criteria_1' => 'Fasilitas Ruang Tunggu', 'criteria_2' => 'Ketersediaan Pelayanan', 'value' => 3.000],
            ['criteria_1' => 'Fasilitas Ruang Tunggu', 'criteria_2' => 'Fasilitas Ruang Tunggu', 'value' => 1.000],
            ['criteria_1' => 'Fasilitas Ruang Tunggu', 'criteria_2' => 'Kualitas Pelayanan', 'value' => 0.333],

            ['criteria_1' => 'Kualitas Pelayanan', 'criteria_2' => 'Harga', 'value' => 3.000],
            ['criteria_1' => 'Kualitas Pelayanan', 'criteria_2' => 'Ketersediaan Pelayanan', 'value' => 3.000],
            ['criteria_1' => 'Kualitas Pelayanan', 'criteria_2' => 'Fasilitas Ruang Tunggu', 'value' => 3.000],
            ['criteria_1' => 'Kualitas Pelayanan', 'criteria_2' => 'Kualitas Pelayanan', 'value' => 1.000],
        ]);
    }
}
