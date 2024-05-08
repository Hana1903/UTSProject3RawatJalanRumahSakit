<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antrian extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='antrians';

    protected $primaryKey = 'id_antrian';

    public function pasien()
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class,'nomor_antrian');
    }
}

