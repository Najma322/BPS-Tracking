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
        });

        Schema::table('sls', function (Blueprint $table) {
            $table->foreign('id_kecamatan_fk')->references('id_kecamatan')->on('kecamatan');
			$table->foreign('id_desa_fk')->references('id_desa')->on('desa');
        });

		Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role_fk')->references('id_role')->on('roles');
        });

		Schema::table('plotting', function (Blueprint $table) {
            $table->foreign('id_petlap_fk')->references('id')->on('users');
            $table->foreign('id_supervisor_fk')->references('id')->on('users');
			$table->foreign('id_provinsi_fk')->references('id_provinsi')->on('provinsi');
			$table->foreign('id_kabupaten_fk')->references('id_kabupaten')->on('kabupaten');
			$table->foreign('kode_nks_fk')->references('kode_nks')->on('nks');
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->foreign('id_plot_fk')->references('id_plot')->on('plotting');
        });
    }
};
