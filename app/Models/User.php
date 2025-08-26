<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $primaryKey = 'npk';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'npk',
        'name',
        'email',
        'password',
        'nohp',
        'tempat_lahir',
        'tanggal_lahir',
        'no_bpjs',
        'no_ktp',
        'no_npwp',
        'role',
        'plant_id',
        'departement_id',
        'jabatan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
   
    public function plant() 
    {
        return $this->belongsTo(Plant::class);
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isUser()
    {
        return $this->role === 'user';
    }
}

