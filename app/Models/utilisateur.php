<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class utilisateur extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory, Notifiable;

    protected $table = 'utilisateur_tables';

    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'adresse',
        'email',
        'password',
        'id_poste',
        'id_departement',
        'date_embauche',
        'date_naissance',
        'telephone',
        'sexe',
        'matricule'
    ];
    protected $hidden = [
        'email',
        'password',
    ];
    protected static function booted(){
        static::creating(function ($utilisateur) {
            $latestId = static::max('id') ?? 0;
            $utilisateur->matricule = 'EMP' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(150)
              ->height(150);
    }
     public function postes(){
        return $this->belongsTo(poste::class, 'id_poste');
    }
    public function departements(){
        return $this->belongsTo(departement::class, 'id_departement');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos')
            ->singleFile();
    }
    public function getEmailForPasswordReset(){
        return $this->email;
    }
}
