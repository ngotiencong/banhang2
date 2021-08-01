<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\account;
use Illuminate\Support\Facades\Auth;

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
        

        $this->validate($request,[
            'username' => 'required',
            'password' =>'required',
        ],[

            'username.required' => 'email không được để trống',
            'password.required' => 'password không được để trống'
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->intended('admin');
        }else{
            return redirect()->back();
        }
        

    }
    public function logged()
    {
        //
        return view('admin.page.dash');
    }

    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('login');
    }

  
}
