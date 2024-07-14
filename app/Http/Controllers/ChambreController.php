<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index(){

        $chambres = Chambre::all();
        return view('Chambre.index', compact('chambres'));
    }

     public function create(){
        return view('Chambre.create');
     }

     public function store(Request $request){

        $validataData = $request->validate([

            'numero' => 'required',
            'type' => 'required',
            'prix' => 'required',
        ]);

        $chambre = new Chambre;

        $chambre->numero = $request->numero;
        $chambre->type = $request->type;
        $chambre->prix = $request->prix;

        $chambre->save();

        return redirect('/chambre');

     }

     public function update($id){
       $chambres = Chambre::find($id);
       return view('Chambre.update', compact('chambres'));
     }

     public function update_store(Request $request){

        $validataData = $request->validate([

            'numero' => 'required',
            'type' => 'required',
            'prix' => 'required',
        ]);

        $chambre = Chambre::find($request->id);

        $chambre->numero = $request->numero;
        $chambre->type = $request->type;
        $chambre->prix = $request->prix;

        $chambre->update();

        return redirect('/chambre');

     }

     public function delete($id){
        $chambre = Chambre::find($id);
        $chambre->delete();

        return redirect('/chambre');
     }
}