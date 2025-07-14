
@extends('layouts/main')

@section('main')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->



        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->



          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4 ">
                  <span class="text-muted fw-light">Extended UI /</span> Perfect Scrollbar
                </h4>

                <div class="row">
                  <!-- Vertical Scrollbar -->
                  <div class="col-6  col-lg-6">
                    <h6 class="mt-2 text-muted">Images</h6>
                    <div class="card mb-4">
                      <img class="card-img-top" src="{{ asset('storage/'.$laporans->documentasi) }}" alt="Card image cap" />
                      <div class="card-body">
                        <p class="card-text">{{ $laporans->kategori_laporan->jenis_laporan }}</p>
                        <p class="card-text">
                         {{$laporans->detail_laporan}}
                        </p>
                      </div>
                    </div>
                  </div>
                  <!--/ Vertical Scrollbar -->

                  <!-- Horizontal Scrollbar -->

                  <!-- Vertical & Horizontal Scrollbars -->

                </div>
              </div>
              <!-- / Content -->
            <!-- Content -->


            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="" class="footer-link fw-bolder">CAN</a>
                </div>
                <div>

                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



@endsection
