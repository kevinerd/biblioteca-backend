<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;

    const IMG_DEFAULT = '/public/img/autorDefault.png';

    protected $table = 'autores';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'thumb'
    ];

    public function libros() {
        return $this->hasMany(Libro::class);
    }
}
