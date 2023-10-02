<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'site_footers';

    protected $fillable = [
        'sobre',
        'info',
        'contato',
        'endereco',
        'email',
    ];
}
