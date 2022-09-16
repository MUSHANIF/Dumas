<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    protected $fillable = ['pengaduanID', 'tanggapan', 'update'];
    use HasFactory;
    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'pengaduanID', 'id');
    }
}
