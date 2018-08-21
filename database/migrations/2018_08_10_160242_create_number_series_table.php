<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberSeriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_series', function (Blueprint $table) {
            $table->string('code', 10)->primary();
            $table->string('module_code', 30);
            $table->boolean('is_active')->default(true);
            $table->integer('starting_number');
            $table->integer('ending_number');
            $table->integer('last_number_used')->default(0);
            $table->string('last_coded_number_used', 30)->nullable();
            $table->timestamps();

            $table->foreign('module_code')
                    ->references('code')
                    ->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('number_series');
    }

}
