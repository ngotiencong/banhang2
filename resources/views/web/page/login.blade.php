@extends('web.layout.body')
@section('content')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/ogani/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>????ng nh???p</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">

        </div>
        <div class="checkout__form">
            <h4>????ng Nh???p</h4>
            <form action="#">
                <div class="row">
                <div class="col-md-8 col-12">
                    <div class="col-md-12 col-12">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input class="" type="text">
                        </div>
                    </div>
               
               
                    <div class="col-md-12 col-12">
                        <div class="checkout__input">
                            <p>M???t kh???u<span>*</span></p>
                            <input type="text">
                        </div>
                    </div>
               
              

                    </div>
                {{-- <div style="clear: both"></div> --}}
                <div class="col-md-4 col-12 d-flex align-items-center justify-content-center">
                <div class="">

                    <button  type="submit" class="site-btn">????ng nh???p</button>

                </div>
                </div>


                </div>

            </form>
        </div>
        <div class="row">
            <div class="alert alert-primary col-12" role="alert">
                Ch??a c?? t??i kho???n ????ng k?? ngay
            </div>
        </div>
        <div class="checkout__form">
            <h4>????ng K??</h4>
            <form action="#">

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="checkout__input">
                            <p>H??? v?? t??n<span>*</span></p>
                            <input type="text">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="checkout__input">
                            <p>S??? ??i???n tho???i<span>*</span></p>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="checkout__input">
                            <p>?????a ch???<span>*</span></p>
                            <input type="text">
                        </div>
                    </div>
                
                </div>
                

                {{-- <div style="clear: both"></div> --}}

                <div class="col-lg-12 col-md-12 text-center">
                  
                    <button type="submit" class="site-btn">????ng k??</button>
               

                </div>




            </form>
        </div>
    </div>
</section>
@endsection
<!-- Checkout Section End -->