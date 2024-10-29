<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'user_id',
        'nisn',
        'kelas',
        'jurusan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}
