<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRuangan extends Model
{
    use HasFactory;

    public $table = 'data_ruangan';

    protected $fillable = [
        'nama_ruangan'
    ];

    public function inventaris()
    {
        return $this->hasMany(DataInventaris::class, 'ruangan_id', 'id');
    }

    public function checkInventaris($id)
    {
        $check = DataInventaris::where('ruangan_id', $id)->first();

        if ($check != NULL) {
            return true;
        } else {
            return false;
        }
    }

    public function countInventaris($id)
    {
        $count = DataInventaris::where('ruangan_id', $id)->count();

        if ($count > 0) {
            return $count;
        } else {
            return '-';
        }
    }
}
