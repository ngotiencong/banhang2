<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $users = DB::table('users')->paginate(4);
        $data = array
        (
        'shortlist' => DB::table('users')->paginate(4)
        );
       
        return view('admin.page.users.usersList',[
            'users' => $users,
            'data' => $data
        ]);

        
    }
       

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.users.usersAdd');
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
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:100',
            'adress' => 'required|max:100',
            'password' => 'required|regex:/^\S*$/u|min:6',
            'status' => 'required|numeric|between:-1,2',
            'phone' => 'required|numeric|digits_between:0,11',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục vướt quá số lượng cho phép',
            
        ]);
        $users = new users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->adress = $request->adress;
        $users->phone = $request->phone;
        $users->password = md5($request->password);
        $users->status = $request->status;
        $users->save();
        return redirect()->route('users.create')->with('mess','Tạo danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.page.users.usersEdit',['users' => users::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:100',
            'adress' => 'required|max:100',
            'status' => 'required|numeric|between:-1,2',
            'phone' => 'required|numeric|digits_between:0,11',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.max' => 'Tên danh mục vướt quá số lượng cho phép',
            
        ]);
        $users = users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->adress = $request->adress;
        $users->phone = $request->phone;
        $users->status = $request->status;
        $users->save();
        return redirect()->route('users.edit',$id)->with('mess','Chỉnh sửa tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        users::find($id)->delete();
        return redirect()->back();
    }
}
