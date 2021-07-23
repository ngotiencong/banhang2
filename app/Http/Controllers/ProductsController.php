<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use DB;

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
        return view('admin.page.product.productList');
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
        

	$getImg = '';
     
	if($request->hasFile('img')){
	
        
		$this->validate($request, 
			[
				
				'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],			
			[
				'img.mimes' => 'Chỉ chấp nhận hình ảnh với đuôi .jpg .jpeg .png .gif',
				'img.max' => 'Hình ảnh giới hạn dung lượng không quá 2M',
			]
		);
		
		
		$img = $request->file('img');
		$getImg = time().'_'.$img->getClientOriginalName();
       
		$destinationPath = public_path('userfiles/productImg');
		$img->move($destinationPath, $getImg);
        
	}
	
            //name	slug	price	sale_price	desc	content	img	status	category_id
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

        
    
        return redirect()->route('product.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
