@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Bookings</li>
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
                    <th scope="col">Customer</th>
                    <th scope="col">Room</th>
                    <th scope="col">Check in</th>
                    <th scope="col">Check out</th>
                    <th scope="col">Guests</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($viewData["bookings"] as $booking)
                  <tr>
                    <th scope="row">{{$booking->id}}</th>
                    <td>{{$booking["user"]->name}}</td>
                    <td>{{$booking["room"]->number}}</td>
                    <td>{{ $booking->check_in_date}}</td>
                    <td>{{ $booking->check_out_date}}</td>
                    <td>{{$booking->guests}}</td>
                    <td>{{$booking->total_price}}</td>
                    <td>{{$booking->payement_status}}</td>
                    <td>
                      <div class="d-inline-flex">
                      <a href="{{ route('admin.booking.edit', ['id' => $booking->getId()]) }}" class="btn btn-outline-info mr-2">Edit</a>
                      <form action="{{ route('admin.booking.delete', $booking->getId()) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </div>
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