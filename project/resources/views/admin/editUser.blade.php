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
          <li class="breadcrumb-item active">Edit User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">User {{$viewData['user']['id']}}</h5>
              @if($errors->any())
              <ul class="alert alert-danger list-unstyled">
                  @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                  @endforeach
              </ul>
              @endif
              <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('admin.user.update', ['id'=> $viewData['user']->getId()]) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                
                <div class="col-6">
                  <div class="form-floating">
                    <input name="name" type="text" class="form-control" id="floatingname" placeholder="username" value="{{$viewData['user']->name}}">
                    <label for="floatingname">Name</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingemail" placeholder="email" value="{{$viewData['user']->email}}">
                    <label for="floatingemail">Email</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating">
                    <input name="password" type="text" class="form-control" id="floatingpassword" placeholder="password" value="{{$viewData['user']->password}}">
                    <label for="floatingpassword">Password</label>
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