<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecisionMatrix extends Model
{
    use HasFactory;
    protected $table = 'decision_matrix';
    protected $fillable = [
        'alternative',
        'harga',
        'ketersediaan_pelayanan',
        'fasilitas_ruang_tunggu',
        'kualitas_pelayanan',
        'image',
        'address',
        'latitude',
        'longitude',
    ];
    
}
