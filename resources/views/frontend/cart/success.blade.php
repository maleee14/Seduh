@extends('layouts.frontend.master')

@section('title')
    Success
@endsection

@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Thank you. Your Order Has Been Received</h1>
                        <h2 class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Back To Home</a></span>
                        </h2>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
