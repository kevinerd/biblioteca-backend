<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model
{
    use HasFactory;
    use SoftDeletes;

    const DESTACADO = true;
    const NO_DESTACADO = false;

    const DISPONIBLE = true;
    const NO_DISPONIBLE = false;

    const IMG_DEFAULT = '/public/img/tallerDefault.png';

    protected $table = 'talleres';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre', 'descripcion', 'profesor',
        'dias', 'destacado', 'disponible',
        'thumb'
    ];
}
