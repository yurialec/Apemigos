<?php

namespace App\Models\Adm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function rolesPermission()
    {
        return $this->hasMany(RolesPermission::class);
    }
}
