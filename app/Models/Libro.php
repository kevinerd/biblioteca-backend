<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    const SEMANAL = true;
    const NO_SEMANAL = false;

    const DESTACADO = true;
    const NO_DESTACADO = false;

    const IMG_DEFAULT = '/public/img/libroDefault.png';

    protected $table = 'libros';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'isbn', 'titulo', 'autor_id', 'editorial',
        'genero_id', 'paginas', 'anio', 'sinopsis',
        'thumb', 'destacado', 'semanal'
    ];

    public function autor() {
        return $this->belongsTo(Autor::class);
    }

    public function genero() {
        return $this->belongsToMany(Genero::class, 'libro_genero')->withPivot('libro_id');
    }

    public function prestamos() {
        return $this->hasMany(Prestamo::class);
    }

    public function resenias() {
        return $this->hasMany(Resenia::class);
    }
}
