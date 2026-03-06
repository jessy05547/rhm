<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\employe;
class conge extends Model
{
    protected $table = 'conge_tables';

    protected $fillable = [
        'id_utilisateur',
        'id_employe',
        'date_sortie',
        'date_entre',
        'types',
        'validation'
    ];
    public function employees(){
        return $this->belongsTo(employe::class, 'id_employe');
    }
}
