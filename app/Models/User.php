<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;


    protected $table = 'users';
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
        'plant_id',
        'departement_id',
        'jabatan_id',
        'is_active',
    ];


    

    protected $casts = [
        'is_active' => 'boolean',
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
   
    public function getRouteKeyName()
    {
        return 'npk'; // atau kolom lain yang Anda inginkan
    }

    
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
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //helper function to check role
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
    public function isUser()
    {
        return $this->hasRole('user');
    }
    public function isSupervisor()
    {
        return $this->hasRole('supervisor');
    }
    public function isSectionHead()
    {
        return $this->hasRole('section_head');     
    }
}

