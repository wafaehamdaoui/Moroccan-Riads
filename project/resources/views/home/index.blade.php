
@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

    <!-- Hero Section Begin --><!-- banner -->
    <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.png" alt="First slide">
                  <div class="container">
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.png" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.png" alt="Third slide">
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner5.png" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner4.png" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <div class="booking_ocline">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="book_room">
                        <h1>Book a Room Online</h1>
                        <form class="book_now" method="GET" action="{{ route('room.Available') }}" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-md-12">
                                 <span>Arrival</span>
                                 <img class="date_cua" src="images/date.png">
                                 <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="checkin">
                              </div>
                              <div class="col-md-12">
                                 <span>Departure</span>
                                 <img class="date_cua" src="images/date.png">
                                 <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="checkout">
                              </div>
                              <div class="col-md-12">
                                 <button class="book_btn" type="submit">check availability</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Intercontinental LA <br />Westlake Hotel</h2>
                        </div>
                        <p class="f-para">Sona.com is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                            languages.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($viewData["services"] as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <img src="images/service.png" width="55" heigth="55"></img>
                        <h4>{{$service["name"] }}</h4>
                        <p>{{$service["description"] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room category Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Room Category</span>
                        <h2>Discover Our Room Category</h2>
                    </div>
                </div>
                <div class="row">
                @foreach ($viewData["categories"] as $category)
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('/images/'.$category['image']) }}">
                            <div class="hr-text bg">
                                <h3>{{ $category["name"] }}</h3>
                                <h2 class="ml-4">From {{ $category["minPrice"] }}$<span>/Pernight</span></h2>
                                <table class="ml-4">
                                    <tbody >
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td> From {{ $category["minSize"] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/room{{$category['id']}}" class="primary-btn ml-5">More Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room category Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                    @foreach ($viewData["reviews"] as $review)
                        <div class="ts-item">
                            <p>{{ $review->comment }}</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - {{ $review->name }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span> Blogs</span>
                        <h2>Our Blog & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($viewData["blogs"] as $blog)
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{ asset('/images/'.$blog['image']) }}">
                        <div class="bi-text">
                            <span class="b-tag">blog{{ $blog->id }}</span>
                            <div class="bg">
                               <h4><a href="#">{{ $blog->title }}</a></h4>
                                <div class="b-time"><i class="icon_clock_alt"></i>{{$blog->created_at}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
