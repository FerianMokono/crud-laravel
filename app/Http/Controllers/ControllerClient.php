<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Client;
use Illuminate\Http\Request;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;

class ControllerClient extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('Client.index', compact('clients'));
    }

    public function create(){
        return view('Client.create');
    }

    public function store(request $request){

        $validataData = $request->validate([

            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
        ]);

        $clients = new Client;
        $clients->nom = $request->nom;
        $clients->prenom = $request->prenom;
        $clients->adresse = $request->adresse;
        $clients->tel = $request->tel;
        $clients->save();

        return redirect('client')->with('message', 'le client a été ajouté avec success');
    }

    public function update($id){
        $clients = Client::find($id);
        return view('Client.update', compact('clients'));
    }

    public function traitement_update(request $request){

        $validataData = $request->validate([

            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
        ]);

        $client = Client::find($request->id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->tel = $request->tel;
        $client->update();

        return redirect('/client')->with('message', 'le client a été modifier avec success');

    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();

        return redirect('/client')->with('message', 'le client a été supprimer avec success');
    }

    public function show($id){
        $client = Client::find($id);
        return view('Client.show', compact('client'));
    }

    public function search(){

            $search = request()->input('search');
            $clients = Client::where('nom', 'LIKE', "%$search%")
            ->orWhere('prenom', 'LIKE', "%$search%")
            ->get();
            return view('Client.search')->with('clients', $clients);
        }

        public function pdfindex(){

            $clients = Client::all();
            return view('Client.pdf', compact('clients'));
        }

        public function imprime(){

            $clients = Client::all();
             $html = view('Client.pdf', compact('clients'))->render();
            return PDF::loadHTML($html)->download('image-pdf.pdf');

        }

        public function pdfshow(){

            $client = Client::find(1);
            $html = view('Client.pdf2', compact('client'))->render();
            return PDF::loadHTML($html)->download('image-pdf.pdf');
        }

        public function showclient($id){
            $clients = Client::find($id);
            return  view('Client.pdf2', ['client' => $clients]);
        }



}