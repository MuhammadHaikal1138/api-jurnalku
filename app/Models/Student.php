<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'nis',
        'rombel',
        'rayon',
        'total_portofolio',
        'total_sertifikat',
    ];
}
