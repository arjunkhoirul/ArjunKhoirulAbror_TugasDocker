
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Create New Reports</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->

                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">

                    </div>
                    <div class="card-body">
                      <form action="{{ route('petugas.update', $petuga->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Polsek</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                  <div class="input-group">
                                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                      <select class="form-select" id="inputGroupSelect01" name="polsek_id">
                                          @foreach ( $polsek as $daerah )
                                          @if(old('polsek_id',$daerah->polsek_id) == $daerah->id)
                                          <option value="{{ $daerah->id }} " selected>{{ $daerah->nama_polsek }}</option>
                                          @else
                                          <option value="{{ $daerah->id }}">{{ $daerah->nama_polsek }}</option>
                                          @endif
                                        @endforeach
                                      </select>
                                    </div>
                                    @error('polsek_id')
                                    <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                    @enderror
                              </div>
                            </div>
                          </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Petugas</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text" value="{{ old('name', $petuga->name) }}"
                                class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                name="name"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan nama pelapor"
                                aria-label="Masukkan nama pelapor"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                              @error('name')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-envelope">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-envelope" class="input-group-text"
                                ><i class="bx bx-envelope"></i
                              ></span>
                              <input
                                type="text" value="{{ old('email', $petuga->email) }}"
                                class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                name="email"
                                id="basic-icon-default-envelope"
                                placeholder="Masukkan nama pelapor"
                                aria-label="Masukkan nama pelapor"
                                aria-describedby="basic-icon-default-envelope"
                              />
                              @error('email')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">No_hp Petugas</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="text"  value="{{ old('phone', $petuga->phone) }}"
                                id="basic-icon-default-company"
                                class="form-control phone-mask @error('phone')
                                is-invalid
                            @enderror"
                                name="phone"
                                placeholder="+62"
                                aria-label="+62"
                                aria-describedby="basic-icon-default-company2"
                              />
                              @error('phone')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Documentasi</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <div class="input-group">
                                    <input type="file" name="image" value="{{ old('image', $petuga->image) }}"  class="form-control  @error('image')
                                    is-invalid
                                @enderror" id="inputGroupFile02" />
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    @error('image')
                                    <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                    @enderror
                                  </div>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
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
                  <a href="" class="footer-link fw-bolder">CAN</a>
                </div>

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
