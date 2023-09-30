<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $table = 'site_carrousel';

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'nome_link_externo',
        'url_link_externo',
    ];
}
