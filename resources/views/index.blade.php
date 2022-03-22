@extends('layouts.master')

@section('title', __('main.title'))

@section('content')

    <div class="home">
        <div class="home_slider_container">
            
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">
                
                <!-- Slider Item -->
                <div class="owl-item home_slider_item" style="height: 800px">
                    <div class="home_slider_background1" style="background-image:url({{Storage::url('image/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">@lang('main.new_experience')</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="#">@lang('main.buy_now')</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background1" style="background-image:url({{Storage::url('image/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">@lang('main.new_experience')</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="#">@lang('main.buy_now')</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background1" style="background-image:url({{Storage::url('image/home_slider_1.jpg')}})"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title">@lang('main.new_experience')</div>
                                        <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                                        <div class="button button_light home_button"><a href="#">@lang('main.buy_now')</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
    
            <!-- Home Slider Dots -->
            
            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>
                                    <li class="home_slider_custom_dot">03.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
    
        </div>
    </div>
    
    <!-- Ads -->
    
    <div class="avds">
        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
            <div class="avds_small">
                <div class="avds_background" style="background-image:url({{Storage::url('image/avds_small.jpg')}})"></div>
                <div class="avds_small_inner">
                    <div class="avds_discount_container">
                        <img src="storage/image/discount.png" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>20<span>%</span></div>
                                <div>@lang('main.sale')</div>
                            </div>
                        </div>
                    </div>
                    <div class="avds_small_content">
                        <div class="avds_title">@lang('main.smartphone')</div>
                        <div class="avds_link"><a href="categories.html">@lang('main.read')</a></div>
                    </div>
                </div>
            </div>
      
            <div class="avds_large">
                <div class="avds_background" style="background-image:url({{Storage::url('image/avds_large.jpg')}})"></div>
                <div class="avds_large_container">
                    <div class="avds_large_content">
                        <div class="avds_title">@lang('main.professional_camera')</div>
                        <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viver ra velit venenatis fermentum luctus.</div>
                        <div class="avds_link avds_link_large"><a href="categories.html">@lang('main.learn_more')</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div style="position: relative; background:white; z-index:2">
    <div class="container mt-4"> <h1>@lang('main.all_products')</h1>
        <form  method="GET" action="{{route("index")}}">
            <div class="filters row">
                <div class="col-xl-12 col-sm-6 col-md-3 mt-2">
                    <label for="price_from">@lang('main.price_from')
                        <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                    </label>
                    <label for="price_to">@lang('main.to')
                        <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                    </label>
                </div>
                
                <div class="col-sm-2 col-md-2 mt-2">
                    <label for="hit">
                        <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> @lang('main.properties.hit')
                    </label>
                </div>
                <div class="col-sm-2 col-md-2 mt-2">
                    <label for="new">
                        <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> @lang('main.properties.new')
                    </label>
                </div>
                <div class="col-sm-2 col-md-2 mt-2">
                    <label for="recommend">
                        <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> @lang('main.properties.recommend')
                    </label>
                </div>
                <div class="col-xl-12 col-sm-6 col-md-3 mt-2">
                    <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                    <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
                </div>
            </div>
        </form>
    </div>
   
    <div class="container">
        <div class="row ">
            @foreach($skus as $sku)
                <div class="col-sm-3 col-xl-4 col-lg-4 col-md-4">
                    @include('layouts.card', compact('sku'))
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination_main" style="justify-content: center; margin-bottom: 35px">
        {{ $skus->links() }}
    </div>
    
</div>
@endsection
{{--
col-sm-3 col-xl-4 col-lg-4 col-md-4
     --}}