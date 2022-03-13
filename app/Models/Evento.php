<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;

    const IMG_DEFAULT = '/public/img/eventoDefault.png';

    const DESTACADO = true;
    const NO_DESTACADO = false;

    protected $table = 'eventos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'fecha', 'hora',
        'descripcion', 'destacado', 'thumb'
    ];
}
