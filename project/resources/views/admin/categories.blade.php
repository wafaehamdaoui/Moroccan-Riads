@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
  <main id="main" class="main">

  <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Admin</a></li>
          <li class="breadcrumb-item">Categories</li>
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
                  <a href="/addCategory" type="button" class="btn btn-outline-success mt-3">Add New Category</a>
                </div>
              </div>              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Preview</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($viewData["categories"] as $category)
                  <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td><a href="#"><img src="{{ asset('/images/'.$category['image']) }}" alt="" width="65" height="75"></a></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->minSize}}</td>
                    <td>{{$category->minPrice}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                          <a href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}" class="btn btn-outline-info mr-2">Edit</a>
                            <form action="{{ route('admin.category.delete', $category->getId()) }}" method="POST">
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