@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="breadcrumb-text">
                        <h2>Your Reservations</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Bookings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">

            @foreach ($viewData["bookings"] as $booking)
               <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/images/'.$booking['room']['image']) }}" alt="">
                        <div class="ri-text">
                            <table>
                                <tbody>
                                <tr>
                                        <td class="r-o">Check in</td>
                                        <td>{{ $booking["check_in_date"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Check out</td>
                                        <td>{{ $booking["check_in_date"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Total Price</td>
                                        <td>{{ $booking["total_price"] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
      <!-- end our_room -->
</div>
@endsection