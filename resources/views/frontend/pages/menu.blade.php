@extends('layouts.frontend.master')

@section('title')
    Menu
@endsection

@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Our Menu</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">


                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Main Dish</h3>
                    @foreach ($mainDish as $item)
                        <a href="{{ route('single.product', $item->name) }}" class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url({{ url('storage', $item->image) }});">
                            </div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span>{{ $item->name }}</span></h3>
                                    <span class="price">{{ format_uang($item->price) }}</span>
                                </div>
                                <div class="d-block" style="color:#9b9a9a">
                                    <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 8)) }}...</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
                    @foreach ($drinks as $item)
                        <a href="{{ route('single.product', $item->name) }}" class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url({{ url('storage', $item->image) }});">
                            </div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span>{{ $item->name }}</span></h3>
                                    <span class="price">{{ format_uang($item->price) }}</span>
                                </div>
                                <div class="d-block" style="color:#9b9a9a">
                                    <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 8)) }}...</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Coffee</h3>
                    @foreach ($coffee as $item)
                        <a href="{{ route('single.product', $item->name) }}" class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url({{ url('storage', $item->image) }});">
                            </div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span>{{ $item->name }}</span></h3>
                                    <span class="price">{{ format_uang($item->price) }}</span>
                                </div>
                                <div class="d-block" style="color:#9b9a9a">
                                    <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 8)) }}...</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h3 class="mb-5 heading-pricing ftco-animate">Dessert</h3>
                    @foreach ($desserts as $item)
                        <a href="{{ route('single.product', $item->name) }}" class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url({{ url('storage', $item->image) }});">
                            </div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span>{{ $item->name }}</span></h3>
                                    <span class="price">{{ format_uang($item->price) }}</span>
                                </div>
                                <div class="d-block" style="color:#9b9a9a">
                                    <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 8)) }}...</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Signature Menu</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                                    role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

                                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                                    aria-controls="v-pills-3" aria-selected="false">Desserts</a>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">



                                <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel"
                                    aria-labelledby="v-pills-2-tab">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-1.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Lemonade Juice</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-2.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Pineapple Juice</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-3.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Soda Drinks</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-4.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Lemonade Juice</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-5.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Pineapple Juice</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/drink-6.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Soda Drinks</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-3" role="tabpanel"
                                    aria-labelledby="v-pills-3-tab">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-1.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-2.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-3.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-4.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-5.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="menu-wrap">
                                                <a href="#" class="menu-img img mb-4"
                                                    style="background-image: url(images/dessert-6.jpg);"></a>
                                                <div class="text">
                                                    <h3><a href="#">Hot Cake Honey</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries
                                                        Vokalia and Consonantia.</p>
                                                    <p class="price"><span>$2.90</span></p>
                                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add
                                                            to cart</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
