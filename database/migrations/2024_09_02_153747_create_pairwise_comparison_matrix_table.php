<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairwiseComparisonMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairwise_comparison_matrix', function (Blueprint $table) {
            $table->id();
            $table->string('criteria_1');
            $table->string('criteria_2');
            $table->decimal('value', 8, 4);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pairwise_comparison_matrix');
    }
}
