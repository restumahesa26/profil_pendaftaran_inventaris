<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisiTujuan extends Model
{
    use HasFactory;

    public $table = 'visi_misi_tujuan';

    protected $fillable = [
        'jenis', 'isi'
    ];
}
