<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebakaran extends Model
{
    use HasFactory;

    protected $table = 'kebakaran';

    protected $guarded = ['id'];

    public function kerugian()
    {
        return $this->hasOne(Kerugian::class, 'id_kebakaran');
    }

    public function keterangan()
    {
        return $this->hasOne(Keterangan::class, 'id_kebakaran');
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class, 'id_kebakaran');
    }
}