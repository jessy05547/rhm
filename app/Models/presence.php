<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\employe;
class presence extends Model
{
    protected $table = 'presence_tables';

    protected $fillable = [
        'id_utilisateur',
        'id_employe',
        'statut',
        'check_in',
        'check_out',
        'date_pointage',
        'motifs'
    ];
    public function employes(){
        return $this->belongsTo(employe::class, 'id_employe');
    }
}
