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

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Bordered Table -->
              <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3">Create New Petugas</a>
              @if(session()->has('success'))
              <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <div class="card">
                <h5 class="card-header">List Data Petugas</h5>

                <form action="/petugas" method="get">
                    <div class="col-6 col-lg-4">
                    <div class="d-flex gap-1 ms-3">

                        <select name="polsek_id" class="form-select">
                            @php
                                $polsek_id = request()->input('polsek_id');
                            @endphp

                            <option value="">Pilih Polsek</option>
                            @foreach ( $polsek as $pol )

                            <option value="{{ $pol->id }}" @selected(old('polsek_id', $polsek_id) == $pol->id ? true : false)>{{ $pol->nama_polsek }}</option>

                            @endforeach
                        </select>

                        <input class="form-control" name="search" value="{{ request('search') }}" list="datalistOptions" id="exampleDataList"  placeholder="Search..."
                        aria-label="Search...">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                    </div>
                    </form>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Petugas</th>
                          <th>No_hp</th>
                          <th>Email</th>
                          <th>Polsek</th>
                          <th>Date</th>
                          <th>image</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $petugass as $petugas )

                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong>
                            </td>
                          <td>{{ $petugas->name }}</td>
                          <td><span class="badge bg-label-primary me-1"></span>{{ $petugas->phone }}</td>
                          <td>{{ $petugas->email }}</td>
                          <td>{{ $petugas->polsek->nama_polsek }}</td>
                          <td>{{ $petugas->created_at->format('d-M-Y') }}</td>
                <td><img src="{{  asset('storage/image/'.$petugas->image) }}" style="max-height: 100px; overflow:hidden;" alt=""></td>
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
                        <a class="dropdown-item" href="{{ route('petugas.edit', $petugas->id) }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('petugas.destroy', $petugas->id) }}" method="POST">
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
                  <a href=""  class="footer-link fw-bolder">Can</a>
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
