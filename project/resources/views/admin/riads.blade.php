@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item">Riads</li>
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                <div>
                  <a href="/addRiad" type="button" class="btn btn-outline-success mt-3">Add New Riad</a>
                </div>
              </div>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($viewData["riads"] as $riad)
                  <tr>
                    <th scope="row">{{$riad->id}}</th>
                    <td><a href="#"><img src="{{ asset('/images/'.$riad['image']) }}" alt="" width="150" height="80"></a></td>
                    <td>{{$riad->name}}</td>
                    <td>{{$riad->ville}}</td>
                    <td>
                            <a href="{{ route('admin.riad.edit', ['id' => $riad->getId()]) }}" class="btn btn-outline-info mr-2">Edit</a>
                            <form action="{{ route('admin.riad.delete', $riad->getId()) }}" method="POST">
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