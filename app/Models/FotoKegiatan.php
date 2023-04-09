<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKegiatan extends Model
{
    use HasFactory;

    public $table = 'foto_kegiatan';

    protected $fillable = [
        'judul', 'gambar'
    ];
}
