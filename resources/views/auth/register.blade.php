@extends('auth.layouts.master')

@section('title', 'Регистрация')

@section('content')
    <head>
        <link rel="stylesheet" href="css/testcss/bootstrap1.min.css">
        <link rel="stylesheet" href="/css/maincss/checkout_responsive.css">
        <link rel="stylesheet" href="/css/maincss/checkout.css">
        {{-- <script src="/js/bootstrap.min.js"></script> --}}
    </head>
    <div class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="billing checkout_section">
                        {{-- <div class="section_title">Billing Address</div>
                        <div class="section_subtitle">Enter your address info</div> --}}
                        <div class="checkout_form_container">
                            <form method="POST" action="{{route('register')}}" aria-label="Register" id="checkout_form" class="checkout_form">
                                
                                <div>
									<label for="checkout_company">Имя</label>
									<input type="text" id="checkout_company" class="checkout_input">
								</div>
                                <div>
									<label for="checkout_company">E-Mail</label>
									<input id="email" type="email" class="checkout_input" name="email" value="" required>
								</div>
                                <div>
									<label for="password">Пароль</label>
									<input id="password" type="password" class="checkout_input" name="password" required>
								</div>
                                <div>
									<label for="password_confirmation">Подтвердить пароль</label>
									<input id="password-confirm" type="password"  class="checkout_input" name="password_confirmation"
                                    required>
								</div>
                                <div class="form-group">
                                    <button type="submit"  class="newsletter_button trans_200"><span>Зарегистрироваться</span></button>
                                </div>
                                @csrf   
                                {{-- <div class="button order_button"><button role="button" type="submit">Зарегистрироваться</button></div> --}}
                            </form>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-8">
        <div class="card">
            <div class="card-header">Регистрация</div>
            <form method="POST" action="{{ route('register') }}" aria-label="Register">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="" required>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите
                        пароль</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </form>
            <div class="card-body">
            </div>
        </div>
    </div> --}} 
@endsection
