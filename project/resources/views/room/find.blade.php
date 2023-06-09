@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
 <!-- Breadcrumb Section Begin -->
 <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Our {{$viewData["categoryName"]}}</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>{{$viewData["categoryName"]}}</span>
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
            @foreach ($viewData["rooms"] as $room)
               <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/images/'.$room['image']) }}" alt="">
                        <div class="ri-text">
                            <h3>{{ $room["price"] }}$<span>/Pernight</span></h3>
                            <table>
                                <tbody>{{ $room["category"]["name"] }}
                                <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{ $room["size"] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Category:</td>
                                        <td>{{ $room["category"]->getName() }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{ $room["capacity"] }}</td>
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
                            <a href="/room{{$room['id']}}" class="primary-btn">More Details</a>
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