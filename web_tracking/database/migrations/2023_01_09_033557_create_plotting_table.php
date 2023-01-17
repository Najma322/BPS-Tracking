<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plotting', function (Blueprint $table)
        {
            $table->increments('id_plot');
			$table->unsignedInteger('id_petlap_fk');
            $table->unsignedInteger('id_supervisor_fk');
			$table->integer('id_provinsi_fk');
			$table->integer('id_kabupaten_fk');
			$table->string('kode_nks_fk');
			$table->smallInteger('ruta');
			$table->smallInteger('state')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plotting');
    }
};
