<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apnt extends Model
{
    protected $table = 'apnts';

    protected $fillable = [
         "iduser",
         "statut",        
         "phone",
         "horaire",
         "jour",
         "mois",
         "etat"         
    ];
    use HasFactory;
}
