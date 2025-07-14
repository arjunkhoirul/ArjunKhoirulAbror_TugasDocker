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

              <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">

                    <form id="formAccountSettings" onsubmit="return confirm('Apakah Anda Yakin ?');" method="POST" action="{{ route('update', auth()->user()->id  ) }}" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img
                      src="{{ asset('storage/image/'.auth()->user()->image) }}"
                      alt="user-avatar"
                      class="d-block rounded"
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                    />
                    <div class="button-wrapper">
                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                          type="file"
                          id="upload"
                          class="account-file-input"
                          hidden
                          name="image"
                        />
                      </label>
                    </div>
                  </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">

                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Username</label>
                        <input
                          class="form-control"
                          type="text"
                          id="firstName"
                          name="name"
                          value=" {{  auth()->user()->name }}"
                          autofocus
                        />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" id="password"  placeholder="Masukkan Password" required/>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="email"
                          name="email"
                          value="{{  auth()->user()->email }} "
                          placeholder="Masukkan Email"
                        />
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="text"
                            id="phone"
                            name="phone"
                            value=" {{  auth()->user()->phone }} "
                            class="form-control"
                            placeholder="+62"
                          />
                        </div>
                      </div>



                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                  </form>
                </div>
                <!-- /Account -->
              </div>
              <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                  <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                      <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                      <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                  </div>
                  <form id="formAccountDeactivation" action="{{ route('destroy', auth()->user()->id  ) }}" onsubmit="return confirm('Apakah Anda Yakin ?');">
                    @csrf
                    @method('DELETE')
                    <div class="form-check mb-3 ">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


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

