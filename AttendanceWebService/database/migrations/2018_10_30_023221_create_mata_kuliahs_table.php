<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMataKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
<<<<<<< HEAD
            //$table->increments('id');
            $table-> String('nrp');
            $table-> String('nama_mahasiswa');
=======
            $table->string('kode_mk')->primary();
            $table->string('nama_mk');
>>>>>>> e5bcb9d737392d484702e9ad9feb8c7a55551b2b
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
        Schema::dropIfExists('mata_kuliahs');
    }
}
