
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
                      <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Laporan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="category_laporan_id">
                                        @foreach ( $kategoris as $kategori )
                                        @if(old('category_laporan_id',$laporan->category_laporan_id) == $kategori->id)
                                        <option value="{{ $kategori->id }} " selected>{{ $kategori->jenis_laporan }}</option>
                                        @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->jenis_laporan }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                  </div>
                                  @error('category_laporan_id')
                                  <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                  @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kanal Laporan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="kanal_laporan_id">
                                        @foreach ( $kanals as $kanal )
                                        @if(old('kanal_laporan_id',$laporan->kanal_laporan_id) == $kanal->id)
                                        <option value="{{ $kanal->id }} " selected>{{ $kanal->kanal_laporan }}</option>
                                        @else
                                        <option value="{{ $kanal->id }}">{{ $kanal->kanal_laporan }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                  </div>
                                  @error('kanal_laporan_id')
                                  <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                  @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Wilayah Hukum</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="wilayah_id">
                                        @foreach ( $wilayah as $wilaya )
                                        @if(old('wilayah_id',$laporan->wilayah_id) == $wilaya->id)
                                        <option value="{{ $wilaya->id }} " selected>{{ $wilaya->wilayah }}</option>
                                        @else
                                        <option value="{{ $wilaya->id }}">{{ $wilaya->wilayah }}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                  </div>
                                  @error('wilayah_id')
                                  <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                  @enderror
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Pelapor</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="bx bx-user"></i
                              ></span>
                              <input
                                type="text" value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}"
                                class="form-control @error('nama_pelapor')
                                    is-invalid
                                @enderror"
                                name="nama_pelapor"
                                id="basic-icon-default-fullname"
                                placeholder="Masukkan nama pelapor"
                                aria-label="Masukkan nama pelapor"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                              @error('nama_pelapor')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">No_hp Pelapor</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="text"  value="{{ old('phone', $laporan->phone) }}"
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
                                    <input type="file" name="documentasi" value="{{ old('documentasi', $laporan->documentasi) }}"  class="form-control  @error('documentasi')
                                    is-invalid
                                @enderror" id="inputGroupFile02" />
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    @error('documentasi')
                                    <div class="alert alert-primary" role="alert">{{ $message }}</div>
                                    @enderror
                                  </div>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-message">Deskripsi Laporan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="bx bx-comment"></i
                              ></span>
                              <textarea
                                id="basic-icon-default-message"
                                class="form-control @error('detail_laporan')
                                is-invalid
                            @enderror"
                                name="detail_laporan"
                                placeholder="Masukkan Laporan Singkat"
                                aria-label="Masukkan Laporan Singkat"
                                aria-describedby="basic-icon-default-message2"
                              >{{ old('detail_laporan', $laporan->detail_laporan) }}</textarea>
                              @error('detail_laporan')
                              <div class="alert alert-primary" role="alert">{{ $message }}</div>
                              @enderror
                            </div>
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
