<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Egulias\EmailValidator\Parser\Comment;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commentaires = Commentaire::all();
        return view('detailBien', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['commentaire'=> 'required']);
        $comment = new Commentaire();
        $comment->contenu = $request->commentaire;
        $comment->user_id = $request->id_user;
        $comment->bien_id = $request->id_bien;
        $comment->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      
    //     $comments = Commentaire::find($id);
    //  dd($comments);
    //     // $bien = $comments->bien_id;
    //     // dd($bien);

    //   return view('detailBien', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // dd($id);
        $bien_id = $request->input('bien_id');
        $bien = Bien::find($bien_id);
        
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return redirect()->route('index', ['bien' => $bien])->with('success', 'Commentaire supprimé avec succès');

    }
}
