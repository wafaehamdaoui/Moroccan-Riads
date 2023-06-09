@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Riads Fes <br />traditional Moroccan design with modern amenities</h2>
                        </div>
                        <p class="f-para">
                        Riads in Fes are traditional Moroccan houses or palaces with an interior courtyard or garden. They are typically characterized by their beautiful architecture, intricate tilework, and serene atmosphere. Many riads in Fes have been converted into guesthouses or boutique hotels, offering a unique and authentic accommodation experience.


                        </p>
                        <a href="#" class="primary-btn about-btn mb-3">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6 ml-5">
                                <img src="images/about.png" alt="">
                                <img src="images/banner1.png" class="mt-3" alt="">
                                <img src="images/banner4.png" class="mt-3" alt="">
                                <img src="images/banner5.png" class="mt-3 mb-3" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
