@extends('web.layout.body')
@section('content')

<!-- Hero Section Begin -->
<x-hero_section status='block' />
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($category as $cats)
                <div class="col-lg-3">
                    <div class="categories__item set-bg"
                        data-setbg="{{asset("storage/category_image/".$cats->img)}}">
                        <h5><a href="{{$cats->id}}">{{$cats->name}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($category as $cats)
                        <li data-filter=".{{$cats->slug}}">{{$cats->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($product->sortByDesc('created_at')->take(8) as $prod)

            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$prod->category->slug}} fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"
                        data-setbg='{{asset("storage/product_image/". $prod->img)}}'>
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="{{route('home.show',$prod->id)}}"><i class="fa fa-eye"></i></a></li>
                            <li><a class="update-cart" data-url="{{route('cart.add')}}" data-id="{{$prod->id}}" href=""><i
                                        class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('home.show',$prod->id)}}">{{$prod->name}}</a></h6>
                        <h5>{{$prod->price}}</h5>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($category as $cats)

                        <div class="latest-prdouct__slider__item">
                            @foreach ($cats->product->sortByDesc('created_at')->take(3) as $prod)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset("storage/product_image/". $prod->img)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$prod->name}}</h6>
                                    <span>{{$prod->price}}</span>
                                </div>
                            </a>
                            @endforeach

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($category as $cats)

                        <div class="latest-prdouct__slider__item">
                            @foreach ($cats->product->sortByDesc('id')->take(3) as $prod)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset("storage/product_image/". $prod->img)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$prod->name}}</h6>
                                    <span>{{$prod->price}}</span>
                                </div>
                            </a>
                            @endforeach

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($category as $cats)

                        <div class="latest-prdouct__slider__item">
                            @foreach ($cats->product->sortByDesc('id')->take(3) as $prod)
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset("storage/product_image/". $prod->img)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$prod->name}}</h6>
                                    <span>{{$prod->price}}</span>
                                </div>
                            </a>
                            @endforeach

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

<!-- Blog Section End -->

<!-- Footer Section Begin -->


<!-- Js Plugins -->