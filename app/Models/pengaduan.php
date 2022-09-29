<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pengaduan extends Model
{

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class, 'userID', 'id');
    }
    public function tanggapans()
    {
        return $this->hasOne(tanggapan::class, 'pengaduanID', 'id');
    }
}
