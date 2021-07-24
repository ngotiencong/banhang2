<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use DB;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prod = DB::table('products')->paginate(4);
        $data = array
        (
        'shortlist' => DB::table('products')->paginate(4)
        );
       
        return view('admin.page.product.productList',[
            'prod' => $prod,
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
        $category = DB::table('category')->get();
        return view('admin.page.product.productAdd', [
            'category' => $category
        ]);
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
        
    $this->validate($request, 
			[
				'name' => 'required|max:255|unique:products',
                'slug' => 'required|regex:/^\S*$/u|unique:products',
                'desc' => 'required',
                'detail' => 'required',
				'img' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                'price' => 'required|numeric|digits_between:0,11',
                'sale_price' => 'required|numeric|digits_between:0,11',
                'status' => 'required|numeric|between:-1,2',
                'category_id' => 'required|numeric|digits_between:0,11,unique:category,id',
			],			
			[
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.unique' => 'Tên sản phẩm không được trùng',
                'name.max' => 'Tên sản phẩm vướt quá số lượng cho phép',
                'slug.required' => 'Từ khóa không được để trống',
                'slug.unique' => 'Từ khóa không được trùng',
                'slug.regex' => 'Từ khóa không được chứa kí tự space',
				'img.mimes' => 'Chỉ chấp nhận hình ảnh với đuôi .jpg .jpeg .png .gif',
				'img.max' => 'Hình ảnh giới hạn dung lượng không quá 2M',
                'img.required' => 'Hình ảnh không được để trống',
                'desc.required' => 'Mổ tả không được để trống',
                'detail.required' => 'Chi tiết không được để trống',
                'price.required' => 'Giá không được để trống',
                'sale_price.required' => 'Giá khuyến mãi không được để trống',
			]
		);
	$getImg = '';
     
	if($request->hasFile('img')){
		
		
		
		$img = $request->file('img');
		$getImg = time().'_'.$img->getClientOriginalName();
       
		$destinationPath = public_path('userfiles/productImg');
		$img->move($destinationPath, $getImg);
        
	}
	
           
        $products = new products;
        $products->name  = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->sale_price = $request->sale_price;
        $products->desc = $request->desc;
        $products->detail = $request->detail;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        $products->img = $getImg;
        $products->save();

        
    
        return redirect()->route('product.create')->with('mess', 'Thêm mới sản phẩm thành công');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $cats = DB::table('category')->get();
        return view('admin.page.product.productEdit',['product' => products::find($id),'cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    $this->validate($request, 
			[
				'name' => 'required|max:255|unique:products',
                'slug' => 'required|regex:/^\S*$/u|unique:products',
                'desc' => 'required',
                'detail' => 'required',
				'img' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                'price' => 'required|numeric|digits_between:0,11',
                'sale_price' => 'required|numeric|digits_between:0,11',
                'status' => 'required|numeric|between:-1,2',
                'category_id' => 'required|numeric|digits_between:0,11|unique:category,id',
			],			
			[
                'name.required' => 'Tên sản phẩm không được để trống',
                'name.unique' => 'Tên sản phẩm không được trùng',
                'name.max' => 'Tên sản phẩm vướt quá số lượng cho phép',
                'slug.required' => 'Từ khóa không được để trống',
                'slug.unique' => 'Từ khóa không được trùng',
                'slug.regex' => 'Từ khóa không được chứa kí tự space',
				'img.mimes' => 'Chỉ chấp nhận hình ảnh với đuôi .jpg .jpeg .png .gif',
				'img.max' => 'Hình ảnh giới hạn dung lượng không quá 2M',
                'img.required' => 'Hình ảnh không được để trống',
                'desc.required' => 'Mổ tả không được để trống',
                'detail.required' => 'Chi tiết không được để trống',
                'price.required' => 'Giá không được để trống',
                'sale_price.required' => 'Giá khuyến mãi không được để trống',
			]
		);
    $products = products::find($id);
    $getImg = '';
     
	if($request->hasFile('img')){	
		$img = $request->file('img');
		$getImg = time().'_'.$img->getClientOriginalName();
       
		$destinationPath = public_path('userfiles/productImg');
		$img->move($destinationPath, $getImg);
        $products->img = $getImg;
	}
	
           
       
        $products->name  = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->sale_price = $request->sale_price;
        $products->desc = $request->desc;
        $products->detail = $request->detail;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        
        $products->save();

        
        
        return redirect()->route('product.edit',$id)->with('mess', 'Chỉnh sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Storage::delete(public_path('userfiles/productImg/').products::find($id)->img);
        
        products::find($id)->delete();
        return redirect()->back();
    }
}
