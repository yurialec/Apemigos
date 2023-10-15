<?php

namespace App\Models\Adm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = "user_to_role";
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function userPermissions()
    {
        return $this->hasManyThrough(
            Permissions::class,
            RolesPermission::class,
            'permission_id',
            'id',
            'id',
            'role_id'
        );
    }
}
