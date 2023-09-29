<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarea extends Model
{
    use HasFactory;

    protected $table = "tareas";

    public function create (){
        return $this->hasMany(create::class, "id_tarea");
    }
}
