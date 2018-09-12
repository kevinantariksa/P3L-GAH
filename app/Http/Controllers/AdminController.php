<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pelanggan;
use App\Pegawai;
use App\Role;
use App\hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $pegawai= User::join('role','users.id_role','=','role.id_role')
               ->select('users.id_user as id_user','role.deskripsi as id_role','users.username as username','users.email as email')
               ->where('users.id_role','<',5)
               ->orderBy('users.id_user','asc')
               ->get();
       $pelanggan=User::join('role','users.id_role','=','role.id_role')
               ->join('pelanggan','users.id_pel','=','pelanggan.id_pel')
               ->select('users.id_user as id_user','role.deskripsi as id_role','users.username as username','users.email as email')
               ->where('users.id_role','=','5')
               ->orderBy('users.id_user','asc')
               ->get();

   dd($pelanggan);
       return view('/tampiladmin',['pegawai'=>$pegawai,'pelanggan'=>$pelanggan]);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
           $role=Role::all();
        $user=User::all();
        $pegawai=Pegawai::all();
        $hotel=hotel::all();

        return view('buatadmin',['role'=>$role,'user'=>$user,'pegawai'=>$pegawai,'hotel'=>$hotel]);
     }

     public function add(Request $request){
       $role=Role::all();
        $user=User::all();
        $pegawai=Pegawai::all();

        $id=User::orderBy('id_user','desc')->limit(1)->get();
        $idp=Pegawai::orderBy('id_peg','desc')->limit(1)->get();

        $user->id_user = $id+1;
        $user->id_role = $request->input('id_role');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->id_peg = $idp+1;


        $pegawai->jabatan = 0;
        $pegawai->telp = $request->input('telp');
        $pegawai->id_peg = $idp+1;
        $pegawai->id_role = $request->input('id_role');
        $pegawai->email = $request->input('email');
        $pegawai->nama = $request->input('nama');
        $pegawai->id_hotel = $request->input('id_hotel');
        $user->save();
        $pegawai->save();
        return redirect('/tampiladmin')->with('info','New data Saved Successfully');
      }

      public function update($id){
        $role=Role::all();
         $user=User::where('id_user',$id)->first();
         $idpeg=$user->id_peg;
         $pegawai=Pegawai::where('id_peg',$idpeg)->first();
         $hotel = hotel::all();


        return view('updateadmin',compact('role','user','pegawai','hotel'));
      }

      public function edit(Request $request,$id){
        $user=User::where('id_user',$id)->first();
        $idpeg=$user->id_peg;
        $pegawai=Pegawai::where('id_peg',$idpeg)->first();


        $data = array('id_user'=>$user->id_user,
          'username'=> $user->username,
          'email'=> $user->email,
          'password'=> $request->input('password'),
          'id_role'=> $user->id_role,
          'id_peg'=> $user->id_peg,
        );

        $data2 = array('id_peg'=>$pegawai->id_peg,
        'id_role'=> $pegawai->id_role,
          'nama'=> $request->input('nama'),
            'email'=> $pegawai->email,
          'telp'=> $request->input('telp'),
          'id_hotel'=> $pegawai->id_hotel,

        );

        User::where('id_user',$id)
        ->update($data);

        Pegawai::where('id_peg',$idpeg)
        ->update($data2);
        return redirect('/admin')->with('info','Room Update Successfully');
      }

      public function delete($id){
        kamar::where('id_kamar',$id)
        ->delete();
        return redirect('/tampiladmin')->with('info','Room Delete Successfully');
      }
}
