<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MidiasSociais extends Model
{
    use HasFactory;

    protected $table = 'site_midias_sociais';

    protected $fillable = [
        'nome',
        'icone',
        'url',
    ];
}
