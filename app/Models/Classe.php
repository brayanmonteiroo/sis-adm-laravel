<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    // Indicar o nome da tabela
    protected $table = 'classes';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'description', 'course_id'];
}
