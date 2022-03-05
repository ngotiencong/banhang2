@extends('web.layout.body')
@section('content')

<x-hero_section/>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<x-name_page name="Shopping Cart"/>

<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>



                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img style="max-width: 200px" src="{{asset("storage/product_image/".$details['image'])}}" alt="">
                                    <h5>{{$details['name']}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$details['price']}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                      
                                            <input data-url="{{ route('cart.update') }}" data-id="{{$id}}" class="update-from-cart" type="number" min="1" value="{{$details['quantity']}}">
                              
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{$details['price']*$details['quantity']}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="" class="remove-from-cart" data-url="{{ route('cart.remove') }}" data-id="{{$id}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>{{session()->get('total') ?? "0"}}</span></li>
                        <li>Total <span>{{session()->get('total') ?? "0"}}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Shoping Cart Section End -->