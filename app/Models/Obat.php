<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Obat extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='obats';

    protected $primaryKey = 'id_obat';

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }
}
