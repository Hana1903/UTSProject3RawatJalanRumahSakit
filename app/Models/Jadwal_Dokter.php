<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal_Dokter extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='jdwl_dokters';

    protected $primaryKey = 'id_jadwal';

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }

}
