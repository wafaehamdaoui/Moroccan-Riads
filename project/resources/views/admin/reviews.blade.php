@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Reviews</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Room</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($viewData["reviews"] as $review)
                  <tr>
                    <th scope="row">{{$review->id}}</th>
                    <td>{{$review["room"]->number}}</td>
                    <td>{{$review->name}}</td>
                    <td>{{$review->ratting}}</td>
                    <td>{{$review->comment}}</td>
                    <td>
                        <form action="{{ route('admin.review.delete', $review->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection