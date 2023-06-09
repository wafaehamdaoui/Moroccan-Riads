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
                        <h2>Our Riads</h2>
                        <div class="bt-option">
                            <a href="./home.html">Home</a>
                            <span>Riads</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    
    <!-- Riads Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
            @foreach ($viewData["riads"] as $riad)
               <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/images/'.$riad['image']) }}" alt="">
                        <div class="ri-text">
                            <h3>{{ $riad["ville"] }}</h3>
                            <a href="/room{{$riad['id']}}" class="primary-btn mb-3">{{ $riad["name"] }}</a>
                            <h5 >Description:</h5>
                            <p class="max-lines">{{ $riad["description"] }}</p> 
                        </div>
                    </div>
                </div>
               @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        <a href="/riads">1</a>
                        <a href="/riads">2</a>
                        <a href="/riads">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Riad Section End -->
      <!-- end our_room -->
</div>
@endsection