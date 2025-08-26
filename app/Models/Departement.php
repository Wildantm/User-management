<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Departement extends Model
{
    use HasFactory;
    protected $table = 'departements';
    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'nama_departement',
    ];

  
}


