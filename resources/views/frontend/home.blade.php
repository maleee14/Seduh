@extends('layouts.frontend.master')

@section('title')
    Home
@endsection

@section('content')
    {{-- Carousel --}}
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">The Best Coffee Testing Experience</h1>
                        <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p>
                        <p><a href="{{ route('show.cart') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                                href="{{ route('menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                                Menu</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
                        <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                                Menu</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">Welcome</span>
                        <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
                        <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                                Menu</a></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- Carousel End --}}

    {{-- Address and Book Table --}}
    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex align-items-xl-end">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>000 (123) 456 7890</h3>
                                <p>A small river named Duden flows by their place and supplies.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>198 West 21th Street</h3>
                                <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open Monday-Friday</h3>
                                <p>8:00am - 9:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="book p-4">
                    @if (session()->has('date'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('date') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                    <h3>Book a Table</h3>
                    <form action="{{ route('book.table') }}" method="POST" class="appointment-form">
                        @csrf
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                @error('first_name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" name="date" class="form-control appointment_date"
                                        placeholder="Date">
                                    @error('date')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" name="time" class="form-control appointment_time"
                                        placeholder="Time">
                                    @error('time')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="submit" value="Booking" class="btn btn-white py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Address and Book Table End --}}

    {{-- Our Story --}}
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('assets/images/about.jpg') }});"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Story</h2>
                </div>
                <div>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Our Story End --}}

    {{-- Services --}}
    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-choices"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Easy to Order</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-delivery-truck"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Fastest Delivery</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-coffee-bean"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Quality Coffee</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Services End --}}

    {{-- Menu Image --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 pr-md-5">
                    <div class="heading-section text-md-right ftco-animate">
                        <span class="subheading">Discover</span>
                        <h2 class="mb-4">Our Menu</h2>
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                            Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the
                            coast of the Semantics, a large language ocean.</p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset('assets/images/menu-1') }}.jpg);"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry mt-lg-4">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset('assets/images/menu-2') }}.jpg);"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset('assets/images/menu-3') }}.jpg);"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry mt-lg-4">
                                <a href="#" class="img"
                                    style="background-image: url({{ asset('assets/images/menu-4') }}.jpg);"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Menu Image End --}}

    {{-- COunter --}}
    <section class="ftco-counter ftco-bg-dark img" id="section-counter"
        style="background-image: url({{ asset('assets/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Coffee Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="85">0</strong>
                                    <span>Number of Awards</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="10567">0</strong>
                                    <span>Happy Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="900">0</strong>
                                    <span>Staff</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Counter End --}}

    {{-- Best Coffee --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Best Coffee Sellers</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($coffee as $item)
                    <div class="col-md-3">
                        <div class="menu-entry">
                            <a href="{{ route('single.product', $item->id) }}" class="img"
                                style="background-image: url({{ url('storage', $item->image) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('single.product', $item->id) }}">{{ $item->name }}</a></h3>
                                <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}...</p>
                                <p class="price"><span>{{ format_uang($item->price) }}</span></p>
                                <form action="{{ route('add.cart', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" id="product_id" name="product_id"
                                        value="{{ $item->id }}">
                                    <input type="hidden" id="name" name="name" value="{{ $item->name }}">
                                    <input type="hidden" id="price" name="price" value="{{ $item->price }}">
                                    <input type="hidden" id="description" name="description"
                                        value="{{ $item->description }}">
                                    <input type="hidden" id="image" name="image" value="{{ $item->image }}">

                                    <input type="hidden" id="quantity" name="quantity"
                                        class="form-control input-number" value="1" min="1" max="100">

                                    <button type="submit" class="btn btn-primary btn-outline-primary">Add to
                                        Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Best Coffee End --}}

    {{-- Gallery --}}
    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center"
                        style="background-image: url({{ asset('assets/images/gallery-1') }}.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center"
                        style="background-image: url({{ asset('assets/images/gallery-2') }}.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center"
                        style="background-image: url({{ asset('assets/images/gallery-3') }}.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center"
                        style="background-image: url({{ asset('assets/images/gallery-4') }}.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Gallery End --}}

    {{-- 3 Menu --}}
    <section class="ftco-menu">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">

                                <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1"
                                    role="tab" aria-controls="v-pills-1" aria-selected="false">Main Dish</a>
                                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                                    role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
                                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"
                                    role="tab" aria-controls="v-pills-3" aria-selected="false">Dessert</a>

                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                    aria-labelledby="v-pills-1-tab">
                                    <div class="row">
                                        @foreach ($mainDish as $item)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="{{ route('single.product', $item->id) }}"
                                                        class="menu-img img mb-4"
                                                        style="background-image: url({{ url('storage', $item->image) }});"></a>
                                                    <div class="text">
                                                        <h3><a
                                                                href="{{ route('single.product', $item->id) }}">{{ $item->name }}</a>
                                                        </h3>
                                                        <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}
                                                            ...</p>
                                                        <p class="price"><span>{{ format_uang($item->price) }}</span>
                                                        </p>
                                                        <form action="{{ route('add.cart', $item->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="name"
                                                                value="{{ $item->name }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $item->price }}">
                                                            <input type="hidden" name="description"
                                                                value="{{ $item->description }}">
                                                            <input type="hidden" name="image"
                                                                value="{{ $item->image }}">

                                                            <input type="hidden" id="quantity" name="quantity"
                                                                class="form-control input-number" value="1"
                                                                min="1" max="100">

                                                            <button type="submit"
                                                                class="btn btn-primary btn-outline-primary">Add to
                                                                Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                    aria-labelledby="v-pills-2-tab">
                                    <div class="row">
                                        @foreach ($drinks as $item)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="{{ route('single.product', $item->id) }}"
                                                        class="menu-img img mb-4"
                                                        style="background-image: url({{ url('storage', $item->image) }});"></a>
                                                    <div class="text">
                                                        <h3><a
                                                                href="{{ route('single.product', $item->id) }}">{{ $item->name }}</a>
                                                        </h3>
                                                        <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}
                                                            ...</p>
                                                        <p class="price"><span>{{ format_uang($item->price) }}</span>
                                                        </p>
                                                        <form action="{{ route('add.cart', $item->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="name"
                                                                value="{{ $item->name }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $item->price }}">
                                                            <input type="hidden" name="description"
                                                                value="{{ $item->description }}">
                                                            <input type="hidden" name="image"
                                                                value="{{ $item->image }}">

                                                            <input type="hidden" id="quantity" name="quantity"
                                                                class="form-control input-number" value="1"
                                                                min="1" max="100">

                                                            <button type="submit"
                                                                class="btn btn-primary btn-outline-primary">Add to
                                                                Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                    aria-labelledby="v-pills-3-tab">
                                    <div class="row">
                                        @foreach ($desserts as $item)
                                            <div class="col-md-4 text-center">
                                                <div class="menu-wrap">
                                                    <a href="{{ route('single.product', $item->id) }}"
                                                        class="menu-img img mb-4"
                                                        style="background-image: url({{ url('storage', $item->image) }});"></a>
                                                    <div class="text">
                                                        <h3><a
                                                                href="{{ route('single.product', $item->id) }}">{{ $item->name }}</a>
                                                        </h3>
                                                        <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}
                                                            ...</p>
                                                        <p class="price"><span>{{ format_uang($item->price) }}</span>
                                                        </p>
                                                        <form action="{{ route('add.cart', $item->id) }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="name"
                                                                value="{{ $item->name }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $item->price }}">
                                                            <input type="hidden" name="description"
                                                                value="{{ $item->description }}">
                                                            <input type="hidden" name="image"
                                                                value="{{ $item->image }}">

                                                            <input type="hidden" id="quantity" name="quantity"
                                                                class="form-control input-number" value="1"
                                                                min="1" max="100">

                                                            <button type="submit"
                                                                class="btn btn-primary btn-outline-primary">Add to
                                                                Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- 3 Menu End --}}

    {{-- Testimony --}}
    <section class="ftco-section img" id="ftco-testimony"
        style="background-image: url({{ asset('assets/images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Customers Says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row d-flex no-gutters">
                @foreach ($reviews as $item)
                    @if ($loop->odd)
                        <div class="col-lg align-self-sm-end ftco-animate">
                            <div class="testimony">
                                <blockquote>
                                    <p>&ldquo;{{ $item->message }}&rdquo;</p>
                                </blockquote>
                                <div class="author d-flex mt-4">
                                    {{-- <div class="image mr-3 align-self-center">
                                        <img src="{{ asset('assets/images/person_3.jpg') }}" alt="">
                                    </div> --}}
                                    <div class="name align-self-center">{{ $item->name }} <span
                                            class="position">{{ $item->job_title }}</span></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg align-self-sm-end">
                            <div class="testimony overlay">
                                <blockquote>
                                    <p>&ldquo;{{ $item->message }}&rdquo;</p>
                                </blockquote>
                                <div class="author d-flex mt-4">
                                    {{-- <div class="image mr-3 align-self-center">
                                        <img src="{{ asset('assets/images/person_2.jpg') }}" alt="">
                                    </div> --}}
                                    <div class="name align-self-center">{{ $item->name }} <span
                                            class="position">{{ $item->job_title }}</span></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    {{-- Testimony End --}}

    {{-- Blog --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Recent from blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('assets/images/image_1.jpg') }}');">
                        </a>
                        <div class="text py-4 d-block">
                            <div class="meta">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('assets/images/image_2.jpg') }}');">
                        </a>
                        <div class="text py-4 d-block">
                            <div class="meta">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20"
                            style="background-image: url('{{ asset('assets/images/image_3.jpg') }}');">
                        </a>
                        <div class="text py-4 d-block">
                            <div class="meta">
                                <div><a href="#">Sept 10, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">The Delicious Pizza</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Blog End --}}

    {{-- Map and Book Table --}}
    <section class="ftco-appointment">
        <div class="overlay"></div>
        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">
                <div class="col-md-6 d-flex align-self-stretch">
                    <div id="map"></div>
                </div>
                <div class="col-md-6 appointment ftco-animate">
                    @if (session()->has('date'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('date') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                    <h3 class="mb-3">Book a Table</h3>
                    <form action="{{ route('book.table') }}" method="POST" class="appointment-form">
                        @csrf
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                @error('first_name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" name="date" class="form-control appointment_date"
                                        placeholder="Date">
                                    @error('date')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" name="time" class="form-control appointment_time"
                                        placeholder="Time">
                                    @error('time')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group ml-md-4">
                                <input type="submit" value="Booking" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Map and Book Table End --}}
@endsection
