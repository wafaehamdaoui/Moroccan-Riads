@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
          <li class="breadcrumb-item">Rooms</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Datatables</h5>
                <div>
                  <a href="/addRoom" type="button" class="btn btn-outline-success mt-3">Add New Room</a>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Number</th>
                    <th scope="col">Price</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Size</th>
                    <th scope="col">Services</th>
                    <th scope="col">Category</th>
                    <th scope="col">Riad</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($viewData["rooms"] as $room)
                  <tr>
                    <th scope="row">{{$room->id}}</th>
                    <td><a href="#"><img src="{{ asset('/images/'.$room['image']) }}" alt="" width="80" height="70"></a></td>
                    <td>{{$room["number"]}}</td>
                    <td>{{$room->price}}</td>
                    <td>{{$room->capacity}}</td>
                    <td>{{$room->size}}</td>
                    <td>@foreach ($room->services as $service)
                        {{ $service->name }},
                        @endforeach
                    </td>
                    <td>{{$room->category->name}}</td>
                    <td>{{$room->riad->name}}</td>
                    <td>{{$room->status}}</td>
                    <td>
                      <a href="{{ route('admin.room.edit', ['id' => $room->getId()]) }}" class="btn btn-outline-info">Edit</a>
                      <form action="{{ route('admin.room.delete', $room->getId()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
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