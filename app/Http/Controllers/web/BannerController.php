<?php

namespace App\Http\Controllers;

use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = banner::paginate(4);
        $view_data = array
        (
        'shortlist' => banner::paginate(4)
        );
       
        return view('admin.page.banner.bannerList',[
            'banner' => $banner,
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
        return view('admin.page.banner.bannerAdd');
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
            'name' => 'required|max:255|unique:banner',
            'img' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            
        ],[
            'name.required' => 'Tên banner không được để trống',
            'name.unique' => 'Tên banner không được trùng',
            'name.max' => 'Tên banner vướt quá số lượng cho phép',
            'img.mimes' => 'Chỉ chấp nhận hình ảnh với đuôi .jpg .jpeg .png .gif',
            'img.max' => 'Hình ảnh giới hạn dung lượng không quá 2M',
            'img.required' => 'Hình ảnh không được để trống',
        ]);
        $ImageName = '';
     
	if($request->hasFile('img')){
		
		
		
		$ImageName = $request->file('img')->hashName();
        $path =  $request->file('img')->storeAs('public/banner_image', $ImageName);
    }
        $banner = new banner();
        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->desc = $request->desc;
        $banner->sub = $request->sub;
        $banner->status = $request->status;
        $banner->image = $ImageName;
        $banner->save();
        return redirect()->route('banner.create')->with('mess','Tạo banner thành công');
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
        $banner = banner::find($id);
        return view('admin.page.banner.bannerEdit',['banner' => $banner]);
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
        $banner = banner::find($id);
       $this->validate($request,[
            'name' => 'required|max:255',
            'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ],[
            'name.required' => 'Tên banner không được để trống',
            'name.unique' => 'Tên banner không được trùng',
            'name.max' => 'Tên banner vướt quá số lượng cho phép'
        ]);
        //
        $ImageName = '';

        if ($request->hasFile('img')) {


            Storage::delete('public/banner_image/'.banner::find($id)->image);
            $ImageName = $request->file('img')->hashName();
            $path =  $request->file('img')->storeAs('public/banner_image', $ImageName);
            $banner->image = $ImageName;
        }

        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->desc = $request->desc;
        $banner->sub = $request->sub;
        $banner->status = $request->status;
       
        $banner->save();
        return redirect()->route('banner.edit',$id)->with('mess', 'Sửa banner thành công');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('public/banner_image/'.banner::find($id)->image);
        banner::find($id)->delete();
        return redirect()->back();
    }
}
