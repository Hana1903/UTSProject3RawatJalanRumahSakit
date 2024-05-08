<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kunjungan extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table='kunjungans';

    protected $primaryKey = 'id_kunjungan';

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class,'id_pasien');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class,'id_dokter');
    }
}
