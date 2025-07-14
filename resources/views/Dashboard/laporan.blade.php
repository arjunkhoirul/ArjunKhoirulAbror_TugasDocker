@extends('layouts/main')

@section('main')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->



        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @yield('navbar')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Bordered Table -->
              <a href="{{ route('laporan.create') }}" class="btn btn-primary mb-3">Create New Laporan</a>
              @if(session()->has('success'))
              <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <div class="card">
                <div class="row">
                    <div class="col-5  col-lg-5">
                  <h5 class="card-header">List Data</h5>
                  <!-- Search -->
                  <form action="{{ route('laporan.index') }}" method="get">

                    <div class="ms-3 mb-3">
                        <label class="form-label" for="">Fromdate</label>
                        <input type="date" name="fromdate" class="form-control" value="{{ request()->input('fromdate') }}">
                        <label class="form-label mt-3" for="">Todate</label>
                        <input type="date" name="todate" class="form-control" value="{{ request()->input('todate') }}">
                    </div>

                    <div class="d-flex ms-3 gap-1">

                        <select name="id_kategori" class="form-select">
                                 @php
                                    $id_kategori = request()->input('id_kategori');
                                @endphp
                                <option value="">Pilih Kategori</option>
                                @foreach ( $categories as $category )

                                <option value="{{ $category->id }}" @selected(old('id_kategori', $id_kategori) == $category->id ? true : false)>{{ $category->jenis_laporan }}</option>

                                @endforeach
                            </select>

                            <select name="wilayah_id" class="form-select">
                                @php
                                    $wilayah_id = request()->input('wilayah_id');
                                @endphp

                                <option value="">Pilih Wilayah</option>
                                @foreach ( $wilayah as $yah )

                                <option value="{{ $yah->id }}" @selected(old('wilayah_id', $wilayah_id) == $yah->id ? true : false)>{{ $yah->wilayah }}</option>

                                @endforeach
                            </select>

                            <select name="kanal_id" class="form-select">
                                @php
                                    $kanal_id = request()->input('kanal_id');
                                @endphp

                                <option value="">Pilih Kanal</option>
                                @foreach ( $kanals as $kanal )

                                <option value="{{ $kanal->id }}" @selected(old('kanal_id', $kanal_id) == $kanal->id ? true : false)>{{ $kanal->kanal_laporan }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex ms-3 col-8 mt-3">

                            <input class="form-control  border-0 shadow-none" name="search" value="{{ request('search') }}" list="datalistOptions" id="exampleDataList"  placeholder="Cari nama petugas,nama pelapor,no hp"
                            aria-label="Search...">

                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- /Search -->


                <div class="card-body">
                  <div class="">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Petugas</th>
                          <th>Kategori Laporan</th>
                          <th>Wilayah Hukum</th>
                          <th>Kanal Laporan</th>
                          <th>Nama Pelapor</th>
                          <th>Date</th>
                          <th>No_hp</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ( $laporans as $laporan )

                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $laporan->name }}</td>
                            <td>{{ $laporan->jenis_laporan }}</td>
                            <td>{{ $laporan->wilayah }}</td>
                            <td>{{ $laporan->kanal_laporan }}</td>
                          <td>{{ $laporan->nama_pelapor }}</td>
                          <td>{{ $laporan->created_at->format('d-M-Y') }}</td>

                          <td><span class="badge bg-label-primary me-1">{{ $laporan->phone }}</span></td>

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
                        <a class="dropdown-item" href="{{ route('laporan.edit', $laporan->id_laporan) }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="{{ route('laporan.show', $laporan->id_laporan) }}"
                        ><i class="bx bx-show me-1"></i>Detail</a
                        >
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('laporan.destroy', $laporan->id_laporan) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn rounded-pill "><i class="bx bx-trash me-1"></i>Hapus</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <div class="alert alert-danger" role="alert">Data Tidak Ada</div>
        @endforelse

                      </tbody>
                    </table>
                  </div>
                </div>
                    {{ $laporans->links() }}
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
  <script>
    $(document).ready(function () {
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert('You clicked on ' + data[0] + "'s row");
    });
});
</script>

