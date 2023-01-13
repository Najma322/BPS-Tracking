<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bps_plotting_model extends Model
{
    use HasFactory;

	protected $fillable = ['id_petlap_fk', 'id_supervisor_fk', 'id_provinsi_fk','id_kabupaten_fk','kode_nks_fk','ruta'];
	protected $table = 'plotting';
	/* public $timestamps = false; */
}
