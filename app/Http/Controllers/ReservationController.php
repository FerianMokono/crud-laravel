<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){

        return view('Reservation.index');
    }

    public function create(){
        return view('Reservation.create');
    }

    public function store(request $request){

        $validataData = $request->validate([

            'clint_id' => 'required|exists:clients,id',
            'chambre_id' => 'required|exists:chambres,id',
            'date_arriver' => 'required',
            'date_depart' => 'required',
        ]);

        $reservation = new Reservation;

        $reservation->client_id = $request->client_id;
        $reservation->chambre_id = $request->chambre_id;
        $reservation->date_arriver = $request->date_arriver;
        $reservation->date_depart = $request->date_depart;
        $reservation->save();

        return redirect('/reservation');
    }
}