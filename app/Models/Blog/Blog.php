<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $with = ['blogUser'];

    protected $fillable = [
        'titulo',
        'data_evento',
        'imagem',
        'texto',
    ];

    public function blogUser()
    {
        return $this->hasManyThrough(
            User::class,
            BlogUser::class,
            'user_id',
            'id',
            'id',
            'blog_id',
        );
    }
}
