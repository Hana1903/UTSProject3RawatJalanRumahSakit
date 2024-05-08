<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    protected $table='pasiens';

    protected $primaryKey = 'id_pasien';
}
