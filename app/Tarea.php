<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //Asignacion dde campos en asignacion masiva
    protected $fillable = ['nombre', 'descripcion', 'estatus', 'id_usuario'];
}
