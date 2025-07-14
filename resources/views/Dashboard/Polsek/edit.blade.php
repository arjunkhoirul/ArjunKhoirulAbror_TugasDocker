
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
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span>Tambah Polsek Baru</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->

                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">


                    <div class="card-body">
                      <form action="{{ route('polsek.update', $polsek->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Laporan</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"

                                ></span>
                                <input
                                  type="text" value="{{ old('nama_polsek', $polsek->nama_polsek) }}"
                                  class="form-control @error('nama_polsek')
                                      is-invalid
                                  @enderror"
                                  name="nama_polsek"
                                  id="basic-icon-default-fullname"
                                  placeholder="Enter nama_polsek"
                                  aria-label="Enter nama_polsek"
                                  aria-describedby="basic-icon-default-fullname2"
                                />
                                @error('nama_polsek')
                                <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href=""  class="footer-link fw-bolder">CAN</a>
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
