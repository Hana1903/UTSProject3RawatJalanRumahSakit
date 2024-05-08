<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    protected $table='pendaftarans';

    protected $primaryKey = 'id_pendaftaran';

    // public function antrian(): BelongsTo
    // {
    //     return $this->belongsTo(Antrian::class,'id_antrian');
    // }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }
}
