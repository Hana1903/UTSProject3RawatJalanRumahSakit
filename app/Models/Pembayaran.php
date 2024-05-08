<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    protected $table='pembayarans';

    protected $primaryKey = 'id_pembayaran';

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class,'id_pendaftaran');
    }
}
