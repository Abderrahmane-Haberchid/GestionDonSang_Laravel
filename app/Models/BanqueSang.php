<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanqueSang extends Model
{
    protected $table = 'banque_sangs';

    protected $fillable = [
         "qte",
         "gp",        
         "iduser",
         "etat",
         "idrdv"        
    ];
    use HasFactory;
}
