@extends('layouts/auth')

@section('login')
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="{{ asset('assets/img/can.png') }}" alt=""class="w-px-50 h-auto rounded-circle">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Dam</span>
                </a>
              </div>
              <!-- /Logo -->

              @if(session()->has('success'))
              <div class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(session()->has('failed'))
              <div class="alert alert-danger alert-dismissible" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <form id="formAuthentication" class="mb-3" action="/login" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control @error('name')  is-invalid   @enderror"
                    @if(Cookie::has('name')) value="{{ Cookie::get('name') }}" @endif
                    id="name"
                    name="name"
                    placeholder="Enter your name or username"
                    autofocus
                  />

                    @error('name')
                    <div class="alert alert-primary" role="alert">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="/forgot">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control @error('password')  is-invalid @enderror"
                      @if(Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                    <div class="alert alert-primary" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" @if(Cookie::has('email')) checked @endif name="remember"/>
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->



  @endsection
