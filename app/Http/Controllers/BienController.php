<?php

namespace App\Http\Controllers;

use App\Mail\BienMail;
use App\Mail\Bienvenue;
use App\Models\Bien;
use App\Models\Commentaire;
use App\Models\GestionBien;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lister
        $bienCommander = Bien::all();
        $bienUserCommander = GestionBien::all()->where('etat',"commander");
        $bienUserNonCommander = GestionBien::all()->where('etat',"nonCommander");

        $user = Auth::user();
       
        return view('template.form',compact('bienCommander','user','bienUserCommander','bienUserNonCommander'));
    }

    // public function bienNonCommander()
    // {
    //     //Lister
    //     $bienNonCommander = Bien::all();
    //     $user = Auth::user();
       
    //     return view('template.form',compact('bienNonCommander','user','bienUserNonCommander'));
    // }

    function apropos() {
        $biens = GestionBien::all()->where('etat',"nonCommander");
        $comments = Commentaire::all();
        return view('about-us',compact('biens','comments'));
    }

    function acceuil() {
        $biens = Bien::all();
        return view('index',compact('biens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function rules()
    {
        return [
            'image' => 'required',
            'nom' => 'required',
            'description' => 'required',
            //'status' => 'required',
            'categorie' => 'required',
            'adresse_localisation' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Desolé! Veuillez choisir une image svp',
            'nom.required' => 'Desolé! le champ nom est Obligatoire',
            'description.required' => 'Desolé! veuillez choisir une description svp',
            //'status.required' => 'Desolé! veuillez choisir un status svp',
            'categorie.required' => 'Desolé! veuillez choisir une categorie svp',
            'adresse_localisation.required' => 'Desolé! l\'adresse de localisation est obligatoir',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        //Enregistrer
        $request->validate($this->rules(), $this->messages());
        $bien = new Bien();
        
        $bien->nom = $request->nom;
        $bien->categorie = $request->categorie;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $bien['image']= $filename;
        }
        $bien->description = $request->description;
        $bien->adresse_localisation = $request->adresse_localisation;
        $bien->nbrChambre = intval($request->nbrChambre);
        $bien->nbrToilette = intval($request->nbrToilette);
        $bien->nbrBalcon = intval($request->nbrBalcon);
        $bien->nbrEspaceVert = intval($request->nbrEspaceVert);
        $bien->dimension = floatval($request->dimension);
        $bien->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $file= $imageFile;
                $filename = date('YmdHi') . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
                $file->move(public_path('public/images'), $filename);
                $image = new Image();
                $image->url = $filename;
                $image->bien_id = $bien->id;
                $image->save();
            }
        }
        $id = $bien->id;
        $gestionBien = new GestionBien();
        $gestionBien->user_id = $user->id;
        $gestionBien->bien_id = $id;
        $gestionBien->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bien=Bien::find($id);
        $users = User::all();
        $user = Auth::user();
        // $gestionBiens = GestionBien::all();

        // foreach ($gestionBiens as $gestionBien) {
        //     if($bien->id === $gestionBien->bien_id){
        //         $gestionBien = $gestionBien->id;
        //         break;
        //     }
        // }
        $images = Image::all();
        return view('template.updateBien',compact('bien', 'users','user','images'));
    }
    
    /**
     */

    public function detail($id)
    {
        $bien=Bien::find($id);
        $user=Auth::user();
        $images = Image::all();
        $comments = Bien::with('commentaires.bienAssocie')->find($id);
        return view('template.detail',compact('bien', 'comments','user','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules(), $this->messages());
        $bien = Bien::find($id);
        $bien->nom = $request->nom;
        $bien->categorie = $request->categorie;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $bien['image']= $filename;
        }
        $bien->description = $request->description;
        $bien->adresse_localisation = $request->adresse_localisation;
        $bien->nbrChambre = intval($request->nbrChambre);
        $bien->nbrToilette = intval($request->nbrToilette);
        $bien->nbrBalcon = intval($request->nbrBalcon);
        $bien->nbrEspaceVert = intval($request->nbrEspaceVert);
        $bien->dimension = floatval($request->dimension);
        $bien->dimension = $request->dimension;
        $bien->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //supprimer
        Bien::find($id)->delete();
        return redirect()->route('index');
    }
}