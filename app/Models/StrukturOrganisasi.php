<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    public $table = 'struktur_organisasi';

    protected $fillable = [
        'struktur_organisasi'
    ];
}
