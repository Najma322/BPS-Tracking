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
        Schema::table('kabupaten', function (Blueprint $table) {
            $table->foreign('id_provinsi_fk')->references('id_provinsi')->on('provinsi');
        });
		
		Schema::table('kecamatan', function (Blueprint $table) {
            $table->foreign('id_kabupaten_fk')->references('id_kabupaten')->on('kabupaten');
        });
		
		Schema::table('desa', function (Blueprint $table) {
            $table->foreign('id_kecamatan_fk')->references('id_kecamatan')->on('kecamatan');
			$table->foreign('id_sls_fk')->references('id_sls')->on('sls');
        });
		
		Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role_fk')->references('id_role')->on('roles');
        });
    }
};
