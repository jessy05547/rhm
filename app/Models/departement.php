<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\employe;
class departement extends Model
{
    protected $table = 'departement_tables';

    protected $fillable = [
        'departement'
    ];
    public function employee(){
        return $this->hasMany(employe::class, 'id_departement');
    }
}
