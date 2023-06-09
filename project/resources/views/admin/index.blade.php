@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Bookings </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($viewData["bookings"]) }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

		      	<!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Customers </span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($viewData["users"]) }}</h6>
                     </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

			      <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Riads</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bx bx-building-house"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($viewData["riads"]) }}</h6>
                     </div>
                  </div>
                </div>

              </div>
            </div><!-- End Customers Card -->

			     <!-- rooms Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Rooms </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ count($viewData["rooms"]) }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End rooms Card -->

             <!-- top rooms -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Rooms </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Room</th>
                        <th scope="col">Price</th>
                        <th scope="col">Capacity</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($viewData["rooms"] as $room)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('/images/'.$room['image']) }}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">{{$room->number}}</a></td>
                        <td>${{$room->getPrice()}}</td>
                        <td>{{$room->capacity}}</td>
                      </tr>
					            @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End top rooms -->

            <!-- Reports -->
            <div class="col-12">
			
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Reports </h5>
                  <!-- Line Chart -->
                  <div id="barChart"></div>

                  <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#barChart"), {
                    series: [{
                      data: @json($viewData["data"]) 
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 4,
                        horizontal: true,
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    xaxis: {
                      categories: @json($viewData["name"]),
                    }
                  }).render();
                });
              </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- comments -->
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">Recent Reviews </h5>
              @foreach ($viewData["reviews"] as $review)
              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">
                    {{ now()->diffInDays($review->created_at) }}days
                  </div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    {{$review["comment"]}}
                  </div>
                </div><!-- comment item-->

              </div>
			        @endforeach

            </div>
          </div><!-- comments-->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

@endsection