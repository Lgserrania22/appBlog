<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{

    public function __construct(){
      $this->middleware('admin');
    }

    public function index()
    {
        //
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $this->validate($request, [
          'usuario' => 'required',
          'email' => 'required',
          'senha' => 'required|min:3'
        ]);

        $usuario = User::create([
            'name' => $request->usuario,
            'email' => $request->email,
            'password' => bcrypt($request->senha)
        ]);

        $profile = Profile::create([
            'user_id' => $usuario->id,
            'about' => 'Texto de sobre',
            'youtube' => 'youtube.com',
            'facebook' => 'facebook.com',
            'avatar' => 'uploads/avatars/avatar.jpg'
        ]);

        Session::flash('success', 'Usuário adicionado com sucesso!');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash("success", 'Usuário deletado com sucesso!');
        return redirect()->back();
    }

    public function admin($id){
        $user = User::find($id);
        if($user->admin == 0){
          $user->admin = 1;
        }else{
          $user->admin = 0;
        }

        $user->save();

        Session::flash('success', "Permissão alterada com sucesso!");

        return redirect()->back();
    }
}
