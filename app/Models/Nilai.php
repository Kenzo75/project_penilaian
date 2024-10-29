<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id',
        'nilai',
        'catatan',
    ];

    public function siswa()
    {
        $this->belongsTo(Siswa::class);
    }
}
