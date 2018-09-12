<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pelanggan;

class LoginController extends Controller
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

    public function promo()
    {
        return view('promo');
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
    }

    public function loginPage()
    {
      return view('auth.login');
    }

    public function login(Request $request)
    {
      $this->validate($request,[
        'username' => 'required',
        'password' => 'required',
      ]);

      $user_data = $request->except('_token');

      if (Auth::attempt($user_data)) {

        $user = Auth::user();
        $pelanggan = Pelanggan::find($user->id_pel);
        $login = $user->id_role;

        if($login>="5")
        {
            return redirect('/home');
        }
        else {


          return redirect('/admin');
        }

      }
      else {
        return redirect()->route('login.user')->withErrors('Login gagal');
      }
    }

    public function logout()
    {
      Auth::logout();

      return redirect('/');
    }

    public function username(){


      return 'username';
    }

    public function adm(){
      $admin = DB::table('users')->where('id_role','<',5)->get();
      //dd($admin);

      return view('/admdash',compact('admin'));
    }

}
