@extends('layouts.frontend.master')

@section('title')
    Cart
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
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <h1 class="text-center">Carts</h1>
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($carts->count() > 0)
                                    @foreach ($carts as $item)
                                        <tr class="text-center">
                                            <td class="product-remove"><a href="{{ route('remove.item', $item->id) }}"><span
                                                        class="icon-close"></span></a>
                                            </td>

                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image:url({{ url('storage', $item->image) }});"></div>
                                            </td>

                                            <td class="product-name">
                                                <h3>{{ $item->name }}</h3>
                                                <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}...
                                                </p>
                                            </td>

                                            <td class="price">{{ format_uang($item->price) }}</td>

                                            <td>
                                                <div class="input-group mb-3">
                                                    <input disabled type="text" name="quantity"
                                                        class="quantity form-control input-number"
                                                        value="{{ $item->quantity }}" min="1" max="100">
                                                </div>
                                            </td>

                                            <td class="total">{{ format_uang($item->total_amount) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="6">
                                        <h1 class="text-center">No Items in Cart</h1>
                                    </td>
                                @endif
                                <!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{ format_uang($grand_total) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>{{ format_uang(0) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>{{ format_uang(0) }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{ format_uang($grand_total) }}</span>
                        </p>
                    </div>
                    @if ($carts->count() > 0)
                        <form action="{{ route('prepare.checkout') }}" method="post">
                            @csrf
                            <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                            <button type="submit" class="btn btn-primary py-3 px-4">
                                <p class="hover-text">Proceed
                                    to Checkout</p>
                            </button>
                        </form>
                    @else
                        <p class="text-center">
                            <a href="#" class="btn btn-primary py-3 px-4" style="pointer-events: none; opacity: 0.65;"
                                aria-disabled="true">Proceed to Checkout</a>
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">More Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-md-3">
                        <div class="menu-entry">
                            <a href="{{ route('single.product', $item->name) }}" class="img"
                                style="background-image: url({{ url('storage', $item->image) }});"></a>
                            <div class="text text-center pt-4">
                                <h3><a href="{{ route('single.product', $item->name) }}">{{ $item->name }}</a></h3>
                                <p>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 8)) }}...</p>
                                <p class="price"><span>{{ format_uang($item->price) }}</span></p>
                                <form action="{{ route('add.cart', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="price" value="{{ $item->price }}">
                                    <input type="hidden" name="description" value="{{ $item->description }}">
                                    <input type="hidden" name="image" value="{{ $item->image }}">

                                    <input type="hidden" id="quantity" name="quantity" class="form-control input-number"
                                        value="1" min="1" max="100">

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
@endsection
