@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<main id="main" class="main">  
<div class="pagetitle">
      <h1>Data Tables</h1>
      <h5></h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item active">Edit Booking</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Booking {{$viewData['booking']['id']}}</h5>
              @if($errors->any())
              <ul class="alert alert-danger list-unstyled">
                  @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                  @endforeach
              </ul>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('admin.booking.update', ['id'=> $viewData['booking']->getId()]) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                
                <div class="col-md-6">
                  <div class="form-floating">
                  <input name="check_in_date" type="date" class="form-control" id="floatingin" placeholder="check in" value="{{ $viewData['booking']->check_in_date }}">
                    <label for="floatingin">Check In</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="check_out_date" type="date" class="form-control" id="floatingout" placeholder="check out" value="{{ $viewData['booking']->check_out_date }}">
                    <label for="floatingout">Check out</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input name="guests" type="number" class="form-control" id="floatingguests" placeholder="guests" value="{{ $viewData['booking']['guests'] }}">
                    <label for="floatingguests">Guests</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input name="total_price" type="number" class="form-control" id="floatingprice" placeholder="total price" value="{{ $viewData['booking']['total_price'] }}">
                    <label for="floatingprice">Total price</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="payement_status" class="form-select" id="floatingSelect" aria-label="State">
                      <option value="payed" {{ $viewData['booking']['payement_status'] === 'payed' ? 'selected' : '' }}>payed</option>
                      <option value="unpayed" {{ $viewData['booking']['payement_status'] === 'unpayed' ? 'selected' : '' }}>unpayed</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input name="room" type="text" class="form-control" id="floatingroom" placeholder="room number" value="{{ $viewData['booking']['room']->number }}">
                    <label for="floatingroom">Room Number</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                  <input name="user" type="text" class="form-control" id="floatinguser" placeholder="user" value="{{ $viewData['booking']['user']->name }}">
                    <label for="floatinguser">user</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>
          </main><!-- End #main -->
@endsection