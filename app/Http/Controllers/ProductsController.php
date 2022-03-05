<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $prod = new products();
        $prod = $prod->paginate(4);
        $data = array(
            'shortlist' => $prod
        );

        return view('admin.page.product.productList', [
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
        $products = new products;
        $this->validate(
            $request,
            [
                'name' => 'required|max:255|unique:products',
                'slug' => 'required|regex:/^\S*$/u|unique:products',
                'desc' => 'required',
                'detail' => 'required',
                'img' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                'price' => 'required|numeric|digits_between:0,11',
                'sale_price' => 'numeric|digits_between:0,11',
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

            ]
        );
        $getImg = '';
        if ($request->hasFile('img')) {

            // $img = $request->file('img');
            // $getImg = time().'_'.$img->getClientOriginalName();
            // $destinationPath = public_path('userfiles/productImg');
            // $img->move($destinationPath, $getImg);

            $ImageName = $request->file('img')->hashName();
            $path =  $request->file('img')->storeAs('public/product_image', $ImageName);

            if ($request->hasFile('img_list')) {
                $i = 0;
                foreach ($request->file('img_list') as $file) {
                    $ListImageName = $file->hashName();
                    $path = $file->storeAs('public/product_imageDetail', $ListImageName);
                    $img_list[$i++] = $ListImageName;
                }

                $products->img_list  = json_encode($img_list);
            }
        }



        $products->name  = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->sale_price = $request->sale_price;
        $products->desc = $request->desc;
        $products->detail = $request->detail;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        $products->img = $ImageName;
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
        return view('admin.page.product.productEdit', ['product' => products::find($id), 'cats' => $cats]);
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
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'slug' => 'required|regex:/^\S*$/u',
                'desc' => 'required',
                'detail' => 'required',
                'img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'price' => 'required|numeric|digits_between:0,11',
                'status' => 'required|numeric|between:-1,2',
                'sale_price' => 'numeric|digits_between:0,11',
                'category_id' => 'required|numeric|digits_between:0,11',
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
            ]
        );
        $products = products::find($id);
        $ImageName = '';

        if ($request->hasFile('img')) {
            Storage::delete('public/product_image/' . products::find($id)->img);
            $ImageName = $request->file('img')->hashName();
            $path =  $request->file('img')->storeAs('public/product_image', $ImageName);
            $products->img = $ImageName;
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



        return redirect()->route('product.edit', $id)->with('mess', 'Chỉnh sửa sản phẩm thành công');
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

        Storage::delete('public/product_image/' . products::find($id)->img);
        $img_list  = json_decode(products::find($id)->img_list);
        if (isset($img_list)) {
            foreach ($img_list as $item) {
                Storage::delete('public/product_imageDetail/' . $item);
            }
        }


        products::find($id)->delete();
        return redirect()->back();
    }
}
