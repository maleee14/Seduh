@extends('layouts.frontend.master')

@section('title')
    My Review
@endsection

@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($review->count() > 0)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h1 class="text-center">My Reviews</h1>
                                        <a href="{{ route('create.review') }}" class="btn btn-primary">Make a Review</a>
                                    </div>
                                    @foreach ($review as $item)
                                        <tr class="text-center">
                                            <td>
                                                {{ $item->message }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h1 class="text-center">No Reviews</h1>
                                        <a href="{{ route('create.review') }}" class="btn btn-primary">Make a Review</a>
                                    </div>
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
