<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_entrer',
        'date_depart',

    ];

    public function chambre(){

        return $this->belongsTo(Chambre::class);
    }

    public function client(){

        return $this->belongsTo(Client::class);
    }

}