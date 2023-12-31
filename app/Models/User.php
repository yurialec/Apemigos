<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Adm\Permissions;
use App\Models\Adm\Roles;
use App\Models\Adm\RolesPermission;
use App\Models\Blog\BlogUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $with = ['role', 'permissions', 'blogUser'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'laravel_through_key'
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }

    public function permissions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Permissions::class,
            RolesPermission::class,
            'role_id',
            'id',
            'role_id',
            'permission_id',
        );
    }

    public function blogUser()
    {
        return $this->hasMany(BlogUser::class);
    }
}
