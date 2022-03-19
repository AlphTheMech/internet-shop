@extends('layouts.master')

@section('title', __('main.product'))

@section('content')
<head>
    <link rel="stylesheet" href="/css/maincss/product_responsive.css">
    <link rel="stylesheet" href="/css/maincss/product.css">
</head>
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url({{Storage::url('/image/categories.jpg')}})"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title">{{ $skus->product->category->name }}<span>.</span></div>
                            <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product_details">
    <div class="container">
        <div class="row details_row">
            <div class="col-lg-6">
                <div class="details_image">
                    <div class="details_image_large"><img src="{{ Storage::url($skus->product->image)}}" alt="">
                        @if($skus->product->isNew())
                            <div class="product_extra_more product_new"><a href="categories.html">@lang('main.properties.new')</a></div>
                            @endif
            
                            @if($skus->product->isRecommend())
                            <div class="product_extra_more product_sale"><a href="categories.html">@lang('main.properties.recommend')</a></div>
                            @endif
            
                            @if($skus->product->isHit())
                            <div class="product_extra_more product_hit"><a href="categories.html">@lang('main.properties.hit')</a></div>
                            @else
                            <div></div>
                             @endif
                    </div>
                    <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                        <div class="details_image_thumbnail active" data-image="{{ Storage::url($skus->product->image)}}"><img src="{{ Storage::url($skus->product->image)}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="{{ Storage::url($skus->product->image)}}"><img src="{{ Storage::url($skus->product->image)}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="{{ Storage::url($skus->product->image)}}"><img src="{{ Storage::url($skus->product->image)}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="{{ Storage::url($skus->product->image)}}"><img src="{{ Storage::url($skus->product->image)}}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="details_content">
                    <div class="details_name">{{ $skus->product->__('name') }}</div>
                    <div class="details_price">@lang('product.price'): <b>{{ $skus->price }} {{ $currencySymbol }}</div>
                    <div class="in_stock_container">
                        <div class="availability">Наличие:</div>
                        @if($skus->count > 0)
                        <span>Есть в наличии</span>
                        @else
                        <span style="color: red">Нет в наличии</span>
                        @endif
                    </div>
                    <div class="details_text">
                       
                            @isset($skus->product->properties)
                                @foreach ($skus->propertyOptions as $propertyOption)
                                    <p>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</p>
                                @endforeach
                            @endisset
                    </div>
                    <div class="product_quantity_container">
                        @if($skus->isAvailable())
                        <form action="{{ route('basket-add', $skus->product) }}" method="POST"> 
                                <button  type="submit" role="button" class="newsletter_button trans_200"><span>@lang('product.add_to_cart')</span></button>
                            @csrf
                        </form>
                    @else
                
                        <span>@lang('product.not_available')</span>
                        <br>
                        <span>@lang('product.tell_me'):</span>
                        <div class="warning">
                            @if($errors->get('email'))
                                {!! $errors->get('email')[0] !!}
                            @endif
                        </div>
                        <form method="POST" action="{{ route('subscription', $skus) }}">
                            @csrf
                            <input type="text" name="email"> </input>
                            <button type="submit">@lang('product.subscribe')</button>
                        </form>
                    @endif
                        {{-- <div class="button cart_button"><a href="#">Добавить в корзину</a></div> --}}
                    </div>
                    <div class="details_share">
                        <span>Поделиться:</span>
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
        <div class="row description_row">
            <div class="col">
                <div class="description_title_container">
                    <div class="description_title">Описание</div>
                </div>
                <div class="description_text">
                    <p>{{ $skus->product->__('description') }}</p>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
