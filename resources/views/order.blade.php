@extends('layouts.master')

@section('title', __('basket.place_order'))

@section('content')
<head>
    <link rel="stylesheet" href="/css/maincss/checkout_responsive.css">
    <link rel="stylesheet" href="/css/maincss/checkout.css">
    <link rel="stylesheet" href="/css/maincss/contact_responsive.css">
    <link rel="stylesheet" href="/css/maincss/contact.css">
</head>
    {{-- <h1>@lang('basket.approve_order'):</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>@lang('basket.full_cost'): <b>{{ $order->getFullSum() }} {{ $currencySymbol }}.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>@lang('basket.personal_data'):</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.name'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.phone'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        @guest
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.email'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>
                        @endguest
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="@lang('basket.approve_order')">
                </div>
            </form>
        </div>
    </div> --}}
    	
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
										<li><a href="{{route('index')}}">@lang('main.home')</a></li>
										<li><a href="{{route('basket')}}">@lang('basket.cart')</a></li>
										<li>@lang('main.checkout')</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="checkout d-flex justify-content-center ">
		{{-- <div class="container "> --}}
			{{-- <div class="row"> --}}
				<!-- Billing Info -->
				<div class="col-lg-6 d-flex justify-content-center ">
					<div class="billing checkout_section w-50 p-3">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
                        {{-- <p>@lang('basket.full_cost'): <b>{{ $order->getFullSum() }} {{ $currencySymbol }}.</b></p> --}}
						<div class="checkout_form_container">
							<form action="{{ route('basket-confirm') }}" method="POST" id="checkout_form" class="checkout_form">
								<div>
									<label for="checkout_company">@lang('basket.data.name')</label>
									<input type="text" name="name" id="name"  id="checkout_company" class="checkout_input">
								</div>
                                <div>
									<label for="checkout_company">@lang('basket.data.phone')</label>
									<input type="text" name="phone" id="phone" id="checkout_company" class="checkout_input">
								</div>
                                @guest
                                <div>
									<label for="checkout_company">@lang('basket.data.email')</label>
									<input type="text" name="email" id="email" id="checkout_company" class="checkout_input">
								</div>
                                @endguest
                                {{-- <input type="submit" role="button" class="button order_button" value="@lang('basket.approve_order')"> --}}
                                <button type="submit" style="width:100%" class="button contact_button"><span>@lang('basket.approve_order')</span></button> 
                                @csrf
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				{{-- <div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Product</div>
								<div class="order_list_value ml-auto">Total</div>
							</div>
							<ul class="order_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Cocktail Yellow dress</div>
									<div class="order_list_value ml-auto">$59.90</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto">$59.90</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Shipping</div>
									<div class="order_list_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">$59.90</div>
								</li>
							</ul>
						</div>

						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<label class="payment_option clearfix">Paypal
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Cach on delivery
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Credit card
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Direct bank transfer
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>

						<!-- Order Text -->
						<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
						<div class="button order_button"><a href="#">Place Order</a></div>
					</div>
				</div> --}}
			{{-- </div> --}}
		{{-- </div> --}}
	</div>

@endsection
