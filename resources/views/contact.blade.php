@extends('layouts.master')

@section('title', __('main.product'))

@section('content')
<head>
    <link rel="stylesheet" href="/css/maincss/contact_responsive.css">
    <link rel="stylesheet" href="/css/maincss/contact.css">
</head>
<div class="contact">
    <div class="container">
        <div class="row">

            <!-- Get in touch -->
            <div class="col-lg-8 contact_col">
                <div class="get_in_touch">
                    <div class="section_title">Get in Touch</div>
                    <div class="section_subtitle">Say hello</div>
                    <div class="contact_form_container">
                        <form action="#" id="contact_form" class="contact_form">
                            <div class="row">
                                <div class="col-xl-6">
                                    <!-- Name -->
                                    <label for="contact_name">First Name*</label>
                                    <input type="text" id="contact_name" class="contact_input" required="required">
                                </div>
                                <div class="col-xl-6 last_name_col">
                                    <!-- Last Name -->
                                    <label for="contact_last_name">Last Name*</label>
                                    <input type="text" id="contact_last_name" class="contact_input" required="required">
                                </div>
                            </div>
                            <div>
                                <!-- Subject -->
                                <label for="contact_company">Subject</label>
                                <input type="text" id="contact_company" class="contact_input">
                            </div>
                            <div>
                                <label for="contact_textarea">Message*</label>
                                <textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
                            </div>
                            <button class="button contact_button"><span>Send Message</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 offset-xl-1 contact_col">
                <div class="contact_info">
                    <div class="contact_info_section">
                        <div class="contact_info_title">Marketing</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Shippiing & Returns</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Information</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row map_row">
            <div class="col">

                <!-- Google Map -->
                <div class="map">
                    <div id="google_map" class="google_map">
                        <div class="map_container">
                            <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22038.180330297666!2d48.03947340666167!3d46.334209898109606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41a9052bd42dbb7d%3A0x351dbbc5acd5a03b!2z0J7QsdC70LDRgdGC0L3QsNGPINC60LvQuNC90LjRh9C10YHQutCw0Y8g0L_RgdC40YXQuNCw0YLRgNC40YfQtdGB0LrQsNGPINCx0L7Qu9GM0L3QuNGG0LA!5e0!3m2!1sru!2sru!4v1647946252114!5m2!1sru!2sru"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
