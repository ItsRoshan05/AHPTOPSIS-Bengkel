<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DecisionMatrix;

class DecisionMatrixSeeder extends Seeder
{
    public function run()
    {
        DecisionMatrix::insert([
            ['alternative' => 'ZIA MOTOR', 'harga' => 5, 'ketersediaan_pelayanan' => 9, 'fasilitas_ruang_tunggu' => 9, 'kualitas_pelayanan' => 7],
            ['alternative' => 'KAFFA MOTOR', 'harga' => 7, 'ketersediaan_pelayanan' => 7, 'fasilitas_ruang_tunggu' => 7, 'kualitas_pelayanan' => 7],
            ['alternative' => 'HEJO MOTOR', 'harga' => 7, 'ketersediaan_pelayanan' => 5, 'fasilitas_ruang_tunggu' => 3, 'kualitas_pelayanan' => 9],
            ['alternative' => 'DISTARA MOTOR', 'harga' => 5, 'ketersediaan_pelayanan' => 5, 'fasilitas_ruang_tunggu' => 5, 'kualitas_pelayanan' => 5],
            ['alternative' => 'MP MOTOSHOP', 'harga' => 5, 'ketersediaan_pelayanan' => 3, 'fasilitas_ruang_tunggu' => 5, 'kualitas_pelayanan' => 5],
            ['alternative' => 'MULUS MOTOR', 'harga' => 5, 'ketersediaan_pelayanan' => 5, 'fasilitas_ruang_tunggu' => 7, 'kualitas_pelayanan' => 5],
        ]);
    }
}
