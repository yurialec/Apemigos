<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteHead extends Model
{
    use HasFactory;

    protected $table = 'site_heads';

    protected $fillable = [
        'logotipo',
    ];
}
