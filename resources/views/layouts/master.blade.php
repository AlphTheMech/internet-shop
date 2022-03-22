<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>
    {{-- Main style --}}
    <link rel="stylesheet" type="text/css" href="js/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="js/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="/css/maincss/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="/css/maincss/main_styles.css">
    <link rel="stylesheet" href="/css/maincss/responsive.css">
    <link href="/js/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
        rel="stylesheet">
    {{-- Main Js --}}
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/cart.js"></script>
    <script src="/js/categories.js"></script>
    <script src="/js/checkout.js"></script>
    <script src="/js/contact.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/product.js"></script>
    {{-- Plugins --}}
    <script src="/js/plugins/greensock/TweenMax.min.js"></script>
    <script src="/js/plugins/greensock/TimelineMax.min.js"></script>
    <script src="/js/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="/js/plugins/greensock/animation.gsap.min.js"></script>
    <script src="/js/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="/js/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/js/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/js/plugins/easing/easing.js"></script>
    <script src="/js/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="/js/plugins/bootstrap.min.js"></script>
    <script src="/js/plugins/popper.js"></script>
    <script src="/js/plugins/custom.js"></script>
</head>
<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <div class="header_container">
                
                <div class= "container-fluid pl-3 pr-3  " >
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo"><a href="{{ route('index') }}">@lang('main.online_shop')</a></div>
                                <nav class="navbar navbar-inverse navbar-fixed-top">
                                    <div class="container">
                                        <div class="navbar-header">
                                            <a class="navbar-brand" href="{{ route('index') }}"></a>
                                        </div>
                                        <div id="navbar" class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav">
                                                <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                                                <li @routeactive('*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                                                </li>
                                                <li @routeactive('basket*')><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
                                                <li><a href="{{ route('reset') }}">@lang('main.reset_project')</a></li>
                                                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
                            
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                        aria-expanded="false">{{ $currencySymbol }}<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($currencies as $currency)
                                                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                            
                                            <ul class="collapse navbar-collapse">
                                                @guest
                                                    <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                                                @endguest
                            
                                                @auth
                                                    @admin
                                                    <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                                                @else
                                                    <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                                                    @endadmin
                                                    <li><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <nav class="main_nav">
                                    <ul>
                                        <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                                        <li class="hassubs" @routeactive('category*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                                            <ul>
                                                {{-- @foreach($categor as $cat)
                                                <li ><a href="{{ route('category', $cat->code) }}">{{$cat->name}}</a></li>
                                                @endforeach --}}
                                                @foreach ($categories as $category)
                                                <li><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>                               
                                        <li><a href="{{route('contact')}}">@lang('main.contact')</a></li>
                                            @guest
                                                <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                                            @endguest                        
                                            @auth
                                                @admin
                                                <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                                            @else
                                                <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                                                @endadmin
                                                <li><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                                            @endauth
                                        {{-- </ul> --}}
                                        <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
                                        <li class="hassubs">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false">{{ $currencySymbol }}<span class="caret"></span></a>
                                            <ul class="hassubs">
                                                @foreach ($currencies as $currency)
                                                    <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>                                    
                                </nav>
                                <div class="header_extra  ml-auto ">
                                    <div class="shopping_cart">
                                        <li style="list-style: none" @routeactive('basket*')>
                                        <a href="{{ route('basket') }}">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
                                                <g>
                                                    <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
                                                        c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
                                                        C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
                                                        H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
                                                        c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                                </g>
                                            </svg>
                                            <div>@lang('main.cart')</div>
                                        </a>
                                    </li>
                                    </div>
                                    <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </header>
    
        <!-- Menu -->
    
        <div class="menu menu_mm trans_300">
            <div class="menu_container menu_mm">
                <div class="page_menu_content">
                                
                    <ul class="page_menu_nav menu_mm">
                        <li class="page_menu_item menu_mm" @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                        <li class="page_menu_item has-children menu_mm" @routeactive('categor*')>
                            <a href="{{ route('categories') }}">@lang('main.categories')<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection menu_mm">
                                {{-- @foreach($categor as $cat)
                                <li class="page_menu_item menu_mm"><a href="categories.html">{{$cat->name}}</a></li>
                                @endforeach --}}
                                <li class="page_menu_item menu_mm"><a href="categories.html">Category</a></li>
                                <li class="page_menu_item menu_mm"><a href="categories.html">Category</a></li>
                                <li class="page_menu_item menu_mm"><a href="categories.html">Category</a></li>
                                <li class="page_menu_item menu_mm"><a href="categories.html">Category</a></li>
                                <li class="page_menu_item menu_mm"><a href="categories.html">Category</a></li>
                            </ul>
                        </li>                       
                        {{-- <li><a href="{{ route('reset') }}">@lang('main.reset_project')</a></li> --}}                        
                        <li class="page_menu_item menu_mm" ><a href="{{route('contact')}}">@lang('main.contact')</a></li>
                        {{-- <ul class="nav navbar-nav navbar-right"> --}}
                            @guest
                                <li class="page_menu_item menu_mm"><a href="{{ route('login') }}">@lang('main.login')</a></li>
                            @endguest        
                            @auth
                                @admin
                                <li class="page_menu_item menu_mm"><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                            @else
                                <li class="page_menu_item menu_mm"><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                                @endadmin
                                <li class="page_menu_item menu_mm"><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                            @endauth
                        {{-- </ul> --}}
                        <li class="page_menu_item menu_mm"><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
                        <li class="page_menu_item has-children menu_mm">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">{{ $currencySymbol }}<span class="caret"></span><i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection menu_mm">                            
                                @foreach ($currencies as $currency)
                                    <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>   
            <div class="menu_social">
                <ul>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        {{-- <div class="container"> --}}
            <div class="starter-template">
                @if (session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if (session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
              
            </div>
            @yield('content')
        {{-- </div> --}}
        <!-- Ad -->   
        <div class="avds_xl">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="avds_xl_container clearfix">
                            <div class="avds_xl_background" style="background-image:url({{Storage::url('/image/avds_xl.jpg')}})"></div>
                            <div class="avds_xl_content">
                                <div class="avds_title">@lang('main.read_more')</div>
                                <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
                                <div class="avds_link avds_xl_link"><a href="{{route('categories')}}">@lang('main.learn_more')</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Icon Boxes -->
        <div class="icon_boxes">
            <div class="container">
                <div class="row icon_box_row">              
                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="{{Storage::url('/image/icon_1.svg')}}" alt=""></div>
                            <div class="icon_box_title">@lang('main.mailing_list')</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="{{Storage::url('/image/icon_2.svg')}}" alt=""></div>
                            <div class="icon_box_title"> @lang('main.mailing_list1') </div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="{{Storage::url('/image/icon_3.svg')}}" alt=""></div>
                            <div class="icon_box_title">@lang('main.mailing_list2')</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Newsletter --> 
        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter_content text-center">
                            <div class="newsletter_title">@lang('main.subscription')</div>
                            <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
                            <div class="newsletter_form_container">
                                <form action="#" id="newsletter_form" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required">
                                    <button class="newsletter_button trans_200"><span>@lang('main.subscribe')</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Footer -->
        
        <div class="footer_overlay"></div>
        <footer class="footer">
            <div class="footer_background" style="background-image:url({{ Storage::url('image/footer.jpg') }}"></div>
            <div class="container">
                <div class="row">
                    <div class="col">                 
                        <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                            <div class="footer_logo"><a href="#">Pear.</a></div>
                            <div class="col ml-auto mr-auto">
                                <p class="footer_category_title">Категории товаров</p>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li class="product_title"><a href="{{ route('category', $category->code) }}">{{ $category->__('name') }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col ml-auto mr-auto ">
                                <p class="footer_category_title">Популярные товары</p>
                                <ul>
                                    @foreach ($bestSkus as $bestSku)
                                    <li class="product_title"><a href="{{ route('sku',
                                    [$bestSku->product->category->code, $bestSku->product->code, $bestSku]) }}">
                                            {{ $bestSku->product->__('name') }}</a></li>
                                @endforeach
                                </ul>
                            </div>        
                            {{-- <div class="copyright ml-auto mr-auto">
                                    Copyright | Все права защищены <i class="fa fa-heart-o" aria-hidden="true"></i> 
                                </div> --}}
                            <div class="footer_social ml-lg-auto">
                                <ul>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
