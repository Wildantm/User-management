<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = 'plants';

    protected $fillable = ['nama_plant', 'lokasi'];

    // Relasi ke Departement (opsional)
    public function departements()
    {
        return $this->hasMany(Departement::class);
    }

    
}
