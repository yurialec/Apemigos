<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalLinks extends Model
{
    use HasFactory;

    protected $table = 'links_externos';

    protected $fillable = [
        'name',
        'link',
    ];
}
