<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Classe extends Model implements Auditable
{

    use HasFactory, AuditingAuditable;

    // Indicar o nome da tabela
    protected $table = 'classes';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'description', 'order_classe', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
