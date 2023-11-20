<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lister
        $biens = Bien::all();
       
        return view('template.form',compact('biens'));
    }

    function apropos() {
        return view('about-us');
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
            'status' => 'required',
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
            'status.required' => 'Desolé! veuillez choisir un status svp',
            'categorie.required' => 'Desolé! veuillez choisir une categorie svp',
            'adresse_localisation.required' => 'Desolé! l\'adresse de localisation est obligatoir'
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $bien->status = $request->status;
        $bien->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bien=Bien::find($id);
      
        return view('template.updateBien',compact('bien', 'users'));
    }
    
    /**
     */

    public function detail($id)
    {
        $bien=Bien::find($id);
        $comments = Bien::with('commentaires.bienAssocie')->find($id);
        return view('template.detail',compact('bien', 'comments'));
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
        $bien->status = $request->status;
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
