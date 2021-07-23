<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use Auth;

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
        return view('admin.login.login');
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
    public function login(Request $request)
    {
        //
       
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|password'
        ],[
            'email.email' => 'email khong dung dinh dang',
            'email.required' => 'email khong duoc de trong',
            'password.email' => 'password khong dung dinh dang',
            'password.required' => 'password khong duoc de trong'
        ]);
        if(Auth::attempt($request->only('email','password'),flase)){
            return  redirect('admin');
        }else{
            return redirect('login');
        }
        dd($request);

    }

  
}
