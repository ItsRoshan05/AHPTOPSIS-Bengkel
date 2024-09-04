<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairwiseComparisonMatrix extends Model
{
    use HasFactory;
    protected $table = 'pairwise_comparison_matrix';
    protected $fillable = ['criteria_1', 'criteria_2', 'value'];
}
