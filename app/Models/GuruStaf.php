<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruStaf extends Model
{
    use HasFactory;

    public $table = 'guru_staf';

    protected $fillable = [
        'nama', 'bidang', 'pendidikan_terakhir_tingkat', 'pendidikan_terakhir_jurusan', 'pendidikan_terakhir_tahun_lulus', 'foto', 'facebook', 'instagram'
    ];
}
