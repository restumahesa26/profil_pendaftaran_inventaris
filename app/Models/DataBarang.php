<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    public $table = 'data_barang';

    protected $fillable = [
        'nama_barang'
    ];

    public function inventaris()
    {
        return $this->hasMany(DataInventaris::class, 'barang_id', 'id');
    }
}
