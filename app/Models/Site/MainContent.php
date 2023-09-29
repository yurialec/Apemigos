<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainContent extends Model
{
    use HasFactory;

    protected $table = 'site_contents';

    protected $fillable = [
        'titulo',
        'descricao',
    ];
}
