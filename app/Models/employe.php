<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class employe extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'employe_tables';

    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'adresse',
        'email',
        'id_poste',
        'id_utilisateur',
        'id_departement',
        'date_embauche',
        'date_naissance',
        'telephone',
        'sexe',
        'matricule'
    ];
    protected static function booted(){
        static::creating(function ($employe) {
            $latestId = static::max('id') ?? 0;
            $employe->matricule = 'EMP' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    public function postes(){
        return $this->belongsTo(poste::class, 'id_poste');
    }
    public function departements(){
        return $this->belongsTo(departement::class, 'id_departement');
    }
    
}
