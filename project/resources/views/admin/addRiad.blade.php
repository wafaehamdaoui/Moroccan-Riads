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
          <li class="breadcrumb-item active">Add New Riad</li>
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
              <form class="row g-3 mt-3" method="POST" action="{{ route('admin.riad.store') }}" enctype="multipart/form-data">
              @csrf
                
                <div class="col-6">
                  <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="floatingout" placeholder="riad name" value="{{ old('name')}}">
                    <label for="floatingout">Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <select name="ville" class="form-select" id="floatingSelect" aria-label="State">
                      <option>Fez</option>
                      <option>Marrakesh</option>
                      <option>Essaouira</option>
                      <option>Casablanca</option>
                      <option>Agadir</option>
                      <option>Tangiers</option>
                      <option>Rabat</option>
                      <option>El-Jadida</option>
                      <option>Ouarzazate</option>
                    </select>
                    <label for="floatingSelect">City</label>
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
                    <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea" style="height: 150px;" >{{ old('description') }}</textarea>
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