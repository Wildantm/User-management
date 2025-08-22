<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan',
        'departement_id',
    ];


    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    
    //akses langsung ke Plant lewat Departement

    public function plant()
    {
        return $this->departement->plant;
    }
}