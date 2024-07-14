<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'type',
        'prix',
    ];

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}