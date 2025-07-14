@extends('layouts/main')

@section('main')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->



        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Bordered Table -->
              <div class="col-lg-4 col-md-6">
                <div class="mt-3 mb-3">
                  <!-- Button trigger modal -->
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalCenter"
                  >
                  Tambah Polsek
                  </button>
                  <div class="mt-3">
                  @if(session()->has('success'))
                  <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  @error('jenis_laporan')
                  <div class="alert alert-primary" role="alert">{{ $message }}</div>
                  @enderror
                </div>
                  <!-- Modal -->
                  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalCenterTitle">Tambah Polsek</h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col mb-3">
                                <form action="{{ route('polsek.store') }}" method="post">
                                    @csrf
                              <label for="nameWithTitle" class="form-label">Nama Polsek</label>
                              <input
                                type="text"
                                id="nameWithTitle"
                                name="nama_polsek"
                                class="form-control"
                                placeholder="Enter jenis laporan"
                              />
                              @error('nama_polsek')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <h5 class="card-header">Data Polsek</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Polsek</th>
                          <th>Jumlah Anggota</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($polsek as $pol )

                        <tr>
                            <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong>
                          </td>
                          <td><span class="">{{ $pol->nama_polsek }}</span></td>
                          <td><span class="badge bg-label-primary me-1"></span>{{ $pol->user->count() }}</td>
                          <td>
                              <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mt-3 mb-3">
                                        <a class="dropdown-item" href="{{ route('polsek.edit', $pol->id) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                            >

                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('polsek.destroy', $pol->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn rounded-pill "><i class="bx bx-trash me-1"></i>Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->

              <hr class="my-5" />

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
