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
          <li class="breadcrumb-item active">Edit Room</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Room {{$viewData['room']['id']}}</h5>
              @if($errors->any())
              <ul class="alert alert-danger list-unstyled">
                  @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                  @endforeach
              </ul>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('admin.room.update', ['id'=> $viewData['room']->getId()]) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                
                
                <div class="col-6">
                  <div class="form-floating">
                    <input name="number" type="text" class="form-control" id="floatingnumber" placeholder="room number" value="{{$viewData['room']->number}}">
                    <label for="floatingumber">Number</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="price" type="number" class="form-control" id="floatingprice" placeholder="price pernigth" value="{{$viewData['room']->price}}">
                    <label for="floatingprice">Price</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="capacity" type="text" class="form-control" id="floatingcapacity" placeholder="capacity" value="{{$viewData['room']->capacity}}">
                    <label for="floatingcapacity">Capacity</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="size" type="text" class="form-control" id="floatingsize" placeholder="size" value="{{$viewData['room']->size}}">
                    <label for="floatingsize">Size</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="status" class="form-select" id="floatingSelect" aria-label="State">
                      <option value="available" {{ $viewData['room']['status'] === 'available' ? 'selected' : '' }}>available</option>
                      <option value="unavailable" {{ $viewData['room']['status'] === 'unavailable' ? 'selected' : '' }}>unavailable</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3 row">
                    <div class="col-lg-10 col-md-6 col-sm-12">
                     <label class="col-lg-2 col-md-6 col-sm-12 col-form-label text-muted">Image:</label>
                      <input class="form-control" type="file" name="image">
                    </div>

                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea" style="height: 200px;" >{{ $viewData['room']['description'] }}</textarea>
                    <label for="floatingTextarea">Description</label>
                    </div>
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