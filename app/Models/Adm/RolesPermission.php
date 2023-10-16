<?php

namespace App\Models\Adm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    use HasFactory;

    protected $table = "permissions_to_roles";
    protected $primaryKey = 'id';

    protected $hidden = [
        'laravel_through_key'
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function permissions()
    {
        return $this->belongsTo(Permissions::class, 'permission_id');
    }
}
