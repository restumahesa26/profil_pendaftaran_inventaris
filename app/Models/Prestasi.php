<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    public $table = 'prestasi';

    protected $fillable = [
        'anak_id', 'nama_prestasi'
    ];

    public function anak()
    {
        return $this->hasOne(DataAnak::class, 'id', 'anak_id');
    }
}
