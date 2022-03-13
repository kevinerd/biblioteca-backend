<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'generos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];

    public function libros() {
        return $this->belongsToMany(Libro::class, 'libro_genero')->withPivot('genero_id');
    }
}
