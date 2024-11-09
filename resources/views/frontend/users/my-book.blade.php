@extends('layouts.frontend.master')

@section('title')
    My Book
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
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($book->count() > 0)
                                    <h1 class="text-center">My Book Tables</h1>
                                    @foreach ($book as $item)
                                        <tr class="text-center">
                                            <td>
                                                {{ $item->first_name }} {{ $item->last_name }}
                                            </td>
                                            <td>
                                                {{ $item->date }}
                                            </td>
                                            <td>
                                                {{ $item->time }}
                                            </td>
                                            <td>
                                                {{ $item->phone }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h1 class="text-center">No Booking Available</h1>
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
