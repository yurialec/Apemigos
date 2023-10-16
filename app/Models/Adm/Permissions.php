<?php

namespace App\Models\Adm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $hidden = [
        'laravel_through_key'
    ];

    public function rolesPermission()
    {
        return $this->hasMany(RolesPermission::class);
    }
}
