<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classe extends Model
{
    // Indicar o nome da tabela
    protected $table = 'classes';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'description', 'order_classe', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
