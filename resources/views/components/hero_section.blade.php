<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Tất cả danh mục</span>
                    </div>
                    <ul style="display: {{$status ?? 'none'}}">

                        @foreach (DB::table('category')->get() as $cats)

                        <li><a href="{{$cats->id}}">{{$cats->name}}</a></li>
                        @endforeach
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
              <div class="banner__slider owl-carousel">
                @foreach (DB::table('banner')->get() as $banner)
                <div style="display: {{$status ?? 'none'}}" class="item hero__item set-bg" data-setbg="{{asset('storage/banner_image/'.$banner->image)}}">
                    <div class="hero__text">
                        <span>{{$banner->name}}</span>
                        <h2>{{$banner->title}} <br />{{$banner->desc}}</h2>
                        <p>{{$banner->sub}}</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
                @endforeach
              </div>

            </div>
        </div>
    </div>
</section>
<script>
    $(function(){
        var owl = $('.banner__slider');
        owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true
        });
    })
   
</script>
<!-- Hero Section End -->