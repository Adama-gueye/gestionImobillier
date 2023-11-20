<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('template.table',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function biens($id)
    {
        $user = User::find($id);
        $biens = Bien::all();
        return view('indexUser',compact('user','biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bien=Bien::find($id);
        $users = User::all();
        $comments = Commentaire::all();
        return view('detailBien',compact('bien', 'users','comments'));
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
    public function destroy(User $user)
    {
        //
    }
}
