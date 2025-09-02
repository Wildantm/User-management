<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role as SpatieRole;
class Role extends Model
{
protected $fillable = ['name', 'guard_name'];


// relasi ke Users
    public function users()
{
    return $this->hasMany(User::class, 'role');
}
}

