<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use DB; 

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = DB::table('category')->paginate(4);
        $view_data = array
        (
        'shortlist' => DB::table('category')->paginate(4)
        );
       
        return view('admin.page.categoryList',[
            'cats' => $cats,
            'data' => $view_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.categoryAdd');
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
        $category = new category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->save();
        return redirect()->route('category.create')->with('mess','Tạo danh mục thành công');
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
        $category = new category();
        
        return view('admin.page.categoryEdit',['category' => $category->find($id)]);
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
        $category = new category();
       
        $category->where('id',$id)->update(
            [
                'name' => $request->input('name'),
                'slug' => $request->input('slug')
            ]
            );
        return view('admin.page.categoryList',[
            'cats' => DB::table('category')->paginate(7)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::find($id)->delete();
        return redirect()->back();
    }
}
