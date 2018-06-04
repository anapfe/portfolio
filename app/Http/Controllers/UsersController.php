<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class UsersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
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
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($username)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function profileEdit($id)
  {
    $user = User::find($id);
    $param = [
      'user' => $user
    ];
    return view('profile.edit', $param);
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

    $rules = [
      // 'name' => 'required|string|min:6|max:20',
      // 'password' => 'required|string|min:6|confirmed',
      // 'email' => 'required|string|email|max:255|unique:users'
    ];

    $messages = [
      // 'max' => 'El campo debe tener menos de 255 caracteres',
      // 'min' => 'El campo debe tener al menos 6 caracteres',
      // 'required' => 'El campo es obligatorio',
      // 'email' => 'Asegurate de poner un mail válido',
      // 'unique' => 'Ya existe el usuario',
      // 'confirmed' => 'Las contraseñas no son iguales'
    ];

    $request->validate($rules, $messages);

    $user = User::find($id);

    if ($request->input('name') == null ) {
      $user->name = Auth::user()->name;
    } else {
      $user->name = $request->input('name');
    }

    if ($request->input('email') !== null) {
      $user->email = $request->input('email');
    } else {
      $user->email = Auth::user()->email;
    };

    if ($request->input('password') !== null) {
      $user->password = bcrypt($request->input('password'));
    } else {
      $user->password = Auth::user()->password;
    };

    if ($request->has('photo')) {
      $user->photo = $request->input('photo');
      $extension = $request->file('photo')->getClientOriginalExtension();
      $user->photo = $request->file('photo')->storeAs('/users_img', $user->email . "." . $extension, 'public');
    } else {
      $user->photo = Auth::user()->photo;
    };

    $user->save();

    return redirect('/editar_cuenta/' . Auth::user()->id);
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
  }
}
