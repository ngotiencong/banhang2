<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        return view('web.page.home', [
            'category' => category::all(),
            'product' => products::all()
        ]);
    }
    public function shop()
    {
        $list = products::where('sale_price','= ','0')->orderBy('desc')->paginate(9);
        return view('web.page.shop', [
            'category' => category::all(),
            'product' => products::all(),
            'list' => $list
        ]);
    }
    public function contact()
    {

        return view('web.page.contact');
    }
    public function show($id)
    {
        return view('web.page.shopDetail', [
            'category' => category::all(),
            'product' => products::findOrFail($id)
        ]);
    }
}
