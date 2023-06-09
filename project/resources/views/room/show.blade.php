@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Rooms/{{ $room["number"] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="{{ asset('/images/'.$room['image']) }}" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $room["category"]["name"] }}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                </div>
                            </div>
                            <h2>{{ $room["price"] }} $<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{ $room["size"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{ $room["capacity"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Status:</td>
                                        <td>{{ $room["status"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>
                                        @foreach ($room->services as $service)
                                        {{ $service->name }},
                                        @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">{{ $room["description"] }}</p>
                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        @foreach ($room->reviews as $review)
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="images/avatar.webp" alt="">
                            </div>
                            <div class="ri-text">
                                <span>{{ $review->created_at }}</span>
                                <div class="rating">
                                @for ($i = $review->rating; $i > 0; $i--)
                                    <i class="icon_star"></i>
                                @endfor
                                </div>
                                <h5>{{ $review->name }}</h5>
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form method="GET" action="{{ route('review.store') }}" class="ra-form">
                        @csrf    
                        <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="number" min="1" max="5">
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                   
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                    @if($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                        @endforeach
                        </ul>
                        @endif
                        <h3>Reserve Now</h3>
                        <form method="POST" action="{{ route('room.book',$room['id']) }}">
                        @csrf
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input name="checkin" type="date" id="date-in">
                                
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input name="checkout" type="date"  id="date-out">
                                
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select name="guest" id="guest">
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">2 Adults and 1 child</option>
                                    <option value="5">2 Adults and 3 child</option>
                                    <option value="3">3 Adults</option>
                                </select>
                            </div>
                            <button type="submit">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->
@endsection