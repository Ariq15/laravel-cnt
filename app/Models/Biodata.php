<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'latihanodoo_biodata';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'fullname',
        // 'tanggal_lahir',
        'umur',
        // 'hobi_ids',
        // 'kelas_id',
        'jenis_kelamin',
    ];
}
