<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    public $table = 'treatment';

    protected $fillable = [
        'anak_id', 'nama_treatment'
    ];

    public function anak()
    {
        return $this->hasOne(DataAnak::class, 'id', 'anak_id');
    }
}
