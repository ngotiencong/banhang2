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
        $cats = category::paginate(4);
        $view_data = array
        (
        'shortlist' => category::paginate(4)
        );
       
        return view('admin.page.category.categoryList',[
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
        return view('admin.page.category.categoryAdd');
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
            'name' => 'required|max:255|unique:category',
            'slug' => 'required|regex:/^\S*$/u|unique:category',
            'img' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.max' => 'Tên danh mục vướt quá số lượng cho phép',
            'slug.required' => 'Từ khóa danh mục không được để trống',
            'slug.unique' => 'Từ khóa danh mục không được trùng',
            'slug.regex' => 'Từ khóa không được chứa kí tự space',
            'img.mimes' => 'Chỉ chấp nhận hình ảnh với đuôi .jpg .jpeg .png .gif',
            'img.max' => 'Hình ảnh giới hạn dung lượng không quá 2M',
            'img.required' => 'Hình ảnh không được để trống',
        ]);
        $getImg = '';
     
	if($request->hasFile('img')){
		
		
		
		$img = $request->file('img');
		$getImg = time().'_'.$img->getClientOriginalName();
       
		$destinationPath = public_path('userfiles/productImg');
		$img->move($destinationPath, $getImg);
    }
        $category = new category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->img = $getImg;
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
        $category = category::find($id);
        return view('admin.page.category.categoryEdit',['category' => $category]);
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
        $category = category::find($id);
       $this->validate($request,[
            'name' => 'required|max:255',
            'slug' => 'required|regex:/^\S*$/u',
            'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.max' => 'Tên danh mục vướt quá số lượng cho phép',
            'slug.required' => 'Từ khóa danh mục không được để trống',
            'slug.unique' => 'Từ khóa danh mục không được trùng',
            'slug.regex' => 'Từ khóa không được chứa kí tự space'
        ]);
        //
        $getImg = '';

        if ($request->hasFile('img')) {



            $img = $request->file('img');
            $getImg = time() . '_' . $img->getClientOriginalName();

            $destinationPath = public_path('userfiles/productImg');
            $img->move($destinationPath, $getImg);
            $category->img = $getImg;
        }
   
        $category->name = $request->name;
        $category->slug = $request->slug;
       
        $category->save();
        return redirect()->route('category.edit',$id)->with('mess', 'Sửa danh mục thành công');
       
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
