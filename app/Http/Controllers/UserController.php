<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use App\Models\GestionBien;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        return view('template.table',compact('users','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function biens($id)
    {
        $user = User::find($id);
       // $biens = Bien::all();
        $biens = GestionBien::all()->where('etat',"nonCommander");
        return view('indexUser',compact('user','biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function changeRole($id)
    {
        $user = User::find($id);
        if($user->role==='user')
            $user->role = 'admin';
        else
            $user->role = 'user';
        $user->save();
        return redirect()->route('user');
    }
    /**
     * 
     */

     public function updateBienEtat($id)
     {
        $bien = Bien::find($id);
        $user = Auth::user();
        $gestionBiens = GestionBien::all();
        foreach ($gestionBiens as $key => $gestionBien) {
            if($gestionBien->bien_id === $bien->id){
                $gestionBien->etat = "commander";
                $gestionBien->save();
                return back()->with('success','votre commande a été prise en compte nous vous contacterons');
            }
        }
     }
 

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $bien=Bien::find($id);
        $user = Auth::user();
        $comments = Commentaire::all();
        $images = Image::all();
        $gestionBiens = GestionBien::all();

        foreach ($gestionBiens as $gestionBien) {
            if($bien->id === $gestionBien->bien_id){
                $gestionBien = $gestionBien->id;
                break;
            }
        }
        $images = Image::all();
        return view('detailBien',compact('bien','user','images','comments','gestionBien'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user');
    }
}
