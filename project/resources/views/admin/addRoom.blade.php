@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<main id="main" class="main">  
<div class="pagetitle">
      <h1>Data Tables</h1>
      <h5></h5>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active">Add New Room</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              
              @if($errors->any())
              <ul class="alert alert-danger list-unstyled">
                  @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                  @endforeach
              </ul>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3 mt-2" method="POST" action="{{ route('admin.room.store') }}" enctype="multipart/form-data">
              @csrf
                
                
                <div class="col-4">
                  <div class="form-floating">
                    <input name="number" type="text" class="form-control" id="floatingnumber" placeholder="room number" value="{{old('number')}}">
                    <label for="floatingumber">Number</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating">
                    <input name="price" type="number" class="form-control" id="floatingprice" placeholder="price pernigth" value="{{old('price')}}">
                    <label for="floatingprice">Price</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating">
                    <input name="capacity" type="text" class="form-control" id="floatingcapacity" placeholder="capacity" value="{{old('capacity')}}">
                    <label for="floatingcapacity">Capacity</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating">
                    <input name="size" type="text" class="form-control" id="floatingsize" placeholder="size" value="{{old('size')}}">
                    <label for="floatingsize">Size</label>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="status" class="form-select" id="floatingSelect" aria-label="State">
                      <option>Available</option>
                      <option>Unavailable</option>
                    </select>
                    <label for="floatingSelect">Status</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="category" class="form-select" id="floatingSelect" aria-label="State">
                    @foreach ($viewData["categories"] as $category)
                      <option value="{{ $category->id }}">{{$category['name']}}</option>
                      @endforeach
                    </select>
                    <label for="floatingSelect">Category</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="riad" class="form-select" id="floatingSelect" aria-label="State">
                    @foreach ($viewData["riads"] as $riad)
                      <option value="{{ $riad->id }}">{{$riad['name']}}</option>
                      @endforeach
                    </select>
                    <label for="floatingSelect">Riad</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea" style="height: 120px;" >{{ old('description') }}</textarea>
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