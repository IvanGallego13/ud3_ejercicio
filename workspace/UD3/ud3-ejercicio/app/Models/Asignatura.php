<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'notas')
                    ->withPivot('nota') // Incluimos la columna extra `nota`
                    ->withTimestamps();
    }
}

