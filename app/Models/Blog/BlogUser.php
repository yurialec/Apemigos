<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    use HasFactory;

    protected $table = 'blogs_to_users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'blog_id',
        'user_id',
    ];
}
