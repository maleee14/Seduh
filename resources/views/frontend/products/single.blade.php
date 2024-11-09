@extends('layouts.frontend.master')

@section('title')
    {{ $products->name }}
@endsection

@push('style')
    <style>
        .hover-text {
            color: black;
        }

        .btn:hover .hover-text {
            color: #c49b63;
        }
    </style>
@endpush

@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Product
                                Detail</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ url('storage', $products->image) }}" class="image-popup"><img
                            src="{{ url('storage', $products->image) }}" class="img-fluid" alt="{{ $products->name }}"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $products->name }}</h3>
                    <p class="price"><span>{{ format_uang($products->price) }}</span></p>
                    <p>{{ $products->description }}</p>

                    <form action="{{ route('add.cart', $products->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ $products->name }}">
                        <input type="hidden" name="price" value="{{ $products->price }}">
                        <input type="hidden" name="description" value="{{ $products->description }}">
                        <input type="hidden" name="image" value="{{ $products->image }}">
                        <div class="row mt-4">
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="icon-minus"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="icon-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 px-5">
                            <p class="hover-text">Add to Cart</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Related products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @if ($related_product->count() > 0)
                    @foreach ($related_product as $item)
                        <div class="col-md-3">
                            <div class="menu-entry">
                                <a href="{{ route('single.product', $item->id) }}" class="img"
                                    style="background-image: url({{ url('storage', $item->image) }});"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="{{ route('single.product', $item->id) }}">{{ $item->name }}</a></h3>
                                    <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }} ...</p>
                                    <p class="price"><span>{{ format_uang($item->price) }}</span></p>
                                    <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12 ftco-animate" style="text-align: center;">
                        <h3>There Are No Related Products Now</h3>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var quantityInput = $('#quantity');

                $('.quantity-left-minus').click(function(e) {
                    e.preventDefault();
                    var currentVal = parseInt(quantityInput.val());
                    if (!isNaN(currentVal) && currentVal > 1) {
                        quantityInput.val(currentVal - 1);
                    }
                });

                $('.quantity-right-plus').click(function(e) {
                    e.preventDefault();
                    var currentVal = parseInt(quantityInput.val());
                    if (!isNaN(currentVal) && currentVal < 100) {
                        quantityInput.val(currentVal + 1);
                    }
                });
            });
        </script>
    @endpush
@endsection
