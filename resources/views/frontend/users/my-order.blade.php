@extends('layouts.frontend.master')

@section('title')
    My Order
@endsection

@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    {{-- <th>Make Review</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($order->count() > 0)
                                    <h1 class="text-center">My Orders</h1>
                                    @foreach ($order as $item)
                                        <tr class="text-center">
                                            <td>
                                                {{ $item->first_name }} {{ $item->last_name }}
                                            </td>
                                            <td>
                                                {{ $item->phone }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ format_uang($item->grand_total * 15849) }}
                                            </td>
                                            <td>
                                                @if ($item->status == 'processing')
                                                    <h5><span class="badge bg-primary"
                                                            style="color: aliceblue">Processing</span></h5>
                                                @elseif($item->status == 'delivered')
                                                    <h5><span class="badge bg-info"
                                                            style="color: aliceblue">Delivered</span></h5>
                                                @else
                                                    <h5><span class="badge bg-success"
                                                            style="color: aliceblue">Success</span></h5>
                                                @endif
                                            </td>
                                            {{-- @if ($item->status == 'success')
                                                <td>
                                                    <a href="{{ route('create.review') }}"
                                                        class="btn btn-primary">Review</a>
                                                </td>
                                            @else
                                                <td>
                                                    Not Available
                                                </td>
                                            @endif --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <h1 class="text-center">No Orders Available</h1>
                                @endif
                                <!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
