<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{
    

    protected $table = 'equips';
    protected $fillable = [
        'nom',
        'qte'
    ];
    
    use HasFactory;
}
