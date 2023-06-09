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
                        <h2>Our Blogs</h2>
                        <div class="bt-option">
                            <a href="/">Home</a>
                            <span>Blogs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
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