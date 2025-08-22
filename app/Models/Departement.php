<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PlantController;

class Departement extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'nama_departement', 
         'plant_id'];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_npk', 'npk');
    }
}


