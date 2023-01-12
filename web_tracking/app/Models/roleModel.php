<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    use HasFactory;

    protected $fillable = ['nama_role'];
	protected $table = 'roles';
	/* public $timestamps = false; */
}
