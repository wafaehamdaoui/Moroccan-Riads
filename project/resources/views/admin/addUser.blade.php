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
          <li class="breadcrumb-item active">Add New User</li>
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
              <form class="row g-3 mt-4" method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
              @csrf
                
                <div class="col-6">
                  <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="floatingname" placeholder="username" value="{{old('name')}}">
                    <label for="floatingname">Name</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingemail" placeholder="email" value="{{old('email')}}">
                    <label for="floatingemail">Email</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingpassword" placeholder="password" value="{{ old('password') }}">
                    <label for="floatingpassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select name="role" class="form-select" id="floatingSelect" aria-label="State">
                      <option>admin</option>
                      <option>client</option>
                    </select>
                    <label for="floatingSelect">Role</label>
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