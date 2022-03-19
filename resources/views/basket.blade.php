@extends('layouts.master')

@section('title', __('basket.cart'))

@section('content')
<head>
    <link rel="stylesheet" href="/css/maincss/cart_responsive.css">
    <link rel="stylesheet" href="/css/maincss/cart.css">
</head>
<div class="super_container">
<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url({{Storage::url('image/cart.jpg')}})"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    {{-- <li><a href="index.html">Home</a></li>
                                    <li><a href="categories.html">Categories</a></li> --}}
                                    <h1>@lang('basket.cart')</h1>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart Info -->

<div class="cart_info">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Column Titles -->
                <div class="cart_info_columns clearfix">
                    <div class="cart_info_col cart_info_col_product">@lang('basket.name')</div>
                    <div class="cart_info_col cart_info_col_price">@lang('basket.price')</div>
                    <div class="cart_info_col cart_info_col_quantity">@lang('basket.count')</div>
                    <div class="cart_info_col cart_info_col_total">@lang('basket.cost')</div>
                </div>
            </div>
        </div>
        <div class="row cart_items_row">
            <div class="col">
                @foreach($order->skus as $sku)

            
                <!-- Cart Item -->
                <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    <!-- Name -->
                    <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_item_image">
                            <div><img src="{{ Storage::url($sku->product->image) }}" alt=""></div>
                        </div>
                        <div class="cart_item_name_container">
                            <div class="cart_item_name"> <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                                <img height="56px" src="">
                                {{ $sku->product->__('name') }}
                            </a></div>
                            {{-- <div class="cart_item_edit"><a href="#">Edit Product</a></div> --}}
                        </div>
                    </div>
                    <!-- Price -->
                    <div class="cart_item_price">{{ $sku->price }} {{ $currencySymbol }}</div>
                    <!-- Quantity -->
                    <div class="cart_item_quantity">
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Кол</span>
                                {{-- <span>{{ $sku->countInOrder }}</span> --}}
                                <input  value="{{ $sku->countInOrder }}">
                                <div class="quantity_buttons">
                                    {{-- <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div> --}}
                                    {{-- Todo :доделать инпуты --}}
                                    <form   action="{{ route('basket-add', $sku) }}" method="POST">
                                        {{-- <div class="quantity_buttons"> --}}
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control">
                                                <button style="background: none; border:none" type="submit" href="">
                                                    <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        {{-- </div> --}}
                                        @csrf
                                    </form>
                                  
                                    <form action="{{ route('basket-remove', $sku) }}" method="POST">
                                        {{-- <div class="quantity_buttons"> --}}
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control">
                                                <button style="background: none; border:none" type="submit" href="">
                                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        {{-- </div> --}}
                                        @csrf
                                    </form>
                                    {{-- <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="cart_item_total">{{ $sku->price * $sku->countInOrder }} {{ $currencySymbol }}</div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="row row_cart_buttons">
            <div class="col">
                <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                    <div class="button continue_shopping_button"><a href="#">Continue shopping</a></div>
                    <div class="cart_buttons_right ml-lg-auto">
                        <div class="button clear_cart_button"><a href="#">Clear cart</a></div>
                        <div class="button update_cart_button"><a href="#">Update cart</a></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row row_extra">
            <div class="col-lg-4">
                
                <!-- Delivery -->
                {{-- <div class="delivery">
                    <div class="section_title">Shipping method</div>
                    <div class="section_subtitle">Select the one you want</div>
                    <div class="delivery_options">
                        <label class="delivery_option clearfix">Next day delivery
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                            <span class="delivery_price">$4.99</span>
                        </label>
                        <label class="delivery_option clearfix">Standard delivery
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                            <span class="delivery_price">$1.99</span>
                        </label>
                        <label class="delivery_option clearfix">Personal pickup
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                            <span class="delivery_price">Free</span>
                        </label>
                    </div>
                </div> --}}

                <!-- Coupon Code -->
                {{-- @if(!$order->hasCoupon())
                <div class="row">
                    <div class="form-inline pull-right">
                        <form method="POST" action="{{ route('set-coupon') }}">
                            @csrf
                            <label for="coupon">@lang('basket.coupon.add_coupon'):</label>
                            <input class="form-control" type="text" name="coupon">
                            <button type="submit" class="btn btn-success"></button>
                        </form>
                    </div>
                </div>
                @error('coupon')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @else
                <div>@lang('basket.coupon.your_coupon') {{ $order->coupon->code }}</div>
            @endif --}}
            @if(!$order->hasCoupon())
                <div class="coupon">
                    <div class="section_title">@lang('basket.coupon.add_coupon')</div>
                    {{-- <div class="section_subtitle">Enter your coupon code</div> --}}
                    <div class="coupon_form_container">
                        <form method="POST" action="{{ route('set-coupon') }}" id="coupon_form" class="coupon_form">
                            @csrf
                            <input name="coupon" type="text" class="coupon_input" required="required">
                            <button type="submit" class="button coupon_button"><span>@lang('basket.coupon.apply')</span></button>
                        </form>
                    </div>
                </div>
                @error('coupon')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @else
                <div>@lang('basket.coupon.your_coupon') {{ $order->coupon->code }}</div>
            @endif
            </div>

            <div class="col-lg-6 offset-lg-2">
                <div class="cart_total">
                    <div class="section_title">Всего в корзине</div>
                    {{-- <div class="section_subtitle">Final info</div> --}}
                    <div class="cart_total_container">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Промежуточный итог</div>
                                <div class="cart_total_value ml-auto">{{ $sku->price * $sku->countInOrder }} {{ $currencySymbol }}</div>
                            </li>   
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Доставка</div>
                                <div class="cart_total_value ml-auto">Бесплатно</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">@lang('basket.full_cost')</div>
                                <div class="cart_total_value ml-auto">@if($order->hasCoupon())
                                    <td><strike>{{ $order->getFullSum(false) }}</strike>
                                        <b>{{ $order->getFullSum() }}</b> {{ $currencySymbol }}</td>
                                @else
                                    <td>{{ $order->getFullSum() }} {{ $currencySymbol }}</td>
                                @endif
                            </div>
                            </li>
                        </ul>
                    </div>
                    <div class="button checkout_button">          <a type="button" 
                        href="{{ route('basket-place') }}">@lang('basket.place_order')</a></div>
                </div>
            </div>
        </div>
    </div>		
    </div>
</div>
    {{-- <h1>@lang('basket.cart')</h1>
    <p>@lang('basket.ordering')</p>
    <div class="panel">
        <table class="table table-striped">
            <tbody>
            
            <tr>
                <td colspan="3">@lang('basket.full_cost'):</td>
                @if($order->hasCoupon())
                    <td><strike>{{ $order->getFullSum(false) }}</strike>
                        <b>{{ $order->getFullSum() }}</b> {{ $currencySymbol }}</td>
                @else
                    <td>{{ $order->getFullSum() }} {{ $currencySymbol }}</td>
                @endif
            </tr>
            </tbody>
        </table>
        @if(!$order->hasCoupon())
            <div class="row">
                <div class="form-inline pull-right">
                    <form method="POST" action="{{ route('set-coupon') }}">
                        @csrf
                        <label for="coupon">@lang('basket.coupon.add_coupon'):</label>
                        <input class="form-control" type="text" name="coupon">
                        <button type="submit" class="btn btn-success">@lang('basket.coupon.apply')</button>
                    </form>
                </div>
            </div>
            @error('coupon')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        @else
            <div>@lang('basket.coupon.your_coupon') {{ $order->coupon->code }}</div>
        @endif
        <br>
        <div class="row">
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success"
                   href="{{ route('basket-place') }}">@lang('basket.place_order')</a>
            </div>
        </div> --}}
@endsection
