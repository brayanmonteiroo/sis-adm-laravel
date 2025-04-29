<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use \OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{

    use HasFactory, AuditingAuditable;

    // Indicar o nome da tabela
    protected $table = 'courses';

    // Indicar quais colunas podem ser cadastradas
    protected $fillable = ['name', 'price'];

    // Criar relacionamento de 1 para Muitos
    public function classe()
    {
        return $this->hasMany(Classe::class);
    }
}
