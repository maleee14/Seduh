@extends('layouts.frontend.master')

@section('title')
    My Book
@endsection

@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <h1 class="text-center">My Book Tables</h1>
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($book->count() > 0)
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
                                            <td>
                                                @if ($item->status == 'pending')
                                                    <h5><span class="badge bg-primary"
                                                            style="color: aliceblue">Pending</span></h5>
                                                @elseif($item->status == 'confirmed')
                                                    <h5><span class="badge bg-info"
                                                            style="color: aliceblue">Confirmed</span></h5>
                                                @else
                                                    <h5><span class="badge bg-success"
                                                            style="color: aliceblue">Completed</span></h5>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td colspan="5">
                                        <h1 class="text-center">No Booking Available</h1>
                                    </td>
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
