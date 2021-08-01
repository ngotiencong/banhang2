<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $account = account::paginate(4);
        
        $data = array(
            'shortlist' => $account
        );

        return view('admin.page.adminUser.adminUserList',['account' => $account, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.adminUser.adminUserAdd');
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
        $account = new account();
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->save();
        return redirect()->route('account.create')->with('Bạn đã tạo tài khoản thành công');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        account::find($id)->delete();
        return redirect()->back();
    }
}
