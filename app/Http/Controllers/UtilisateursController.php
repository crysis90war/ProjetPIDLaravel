<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UtilisateursController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::get();
        $users = DB::table('users')
                    ->leftJoin('pays', 'users.ref_pays', '=', 'pays.id')
                    ->leftJoin('sexe', 'users.ref_sexe', '=', 'sexe.id')
                    ->select('users.id', 'users.name', 'users.email', 'users.is_admin', 'users.created_at', 'users.updated_at', 'sexe.nom AS sexe', 'pays.nom as pays')
                    ->get();

        return view('admin.utilisateurs.index', [
            'utilisateurs' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.utilisateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.utilisateurs.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user' => User::findOrFail($id),
            'pays' => DB::select('select * from pays'),
            'sexe' => DB::select('select * from sexe')
        ];

        return view('admin.utilisateurs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user = User::findOrFail($id);

        $this->ValiderUtilisateur();

        $user->name = request('name');
        $user->email = request('email');
        $user->is_admin = request('is_admin');
        $user->ref_pays = request('ref_pays');
        $user->ref_sexe = request('ref_sexe');

        $user->save();

        //$user->update($this->ValiderUtilisateur());
        //return dump($user);
        return redirect('/Admin/Utilisateurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id)
        {
            abort(403, 'Action non autorisée');
            //return redirect();
        }
        User::destroy($id);

        return redirect('/Admin/Utilisateurs');
    }

    public function ValiderUtilisateur()
    {
        return request()->validate([
            'name' => 'required|min:3|max:20|regex:/(^[A-Za-z0-9 ]+$)+/',
            'email' => 'required|email',
            'is_admin' => 'required'
        ]);
    }
}
