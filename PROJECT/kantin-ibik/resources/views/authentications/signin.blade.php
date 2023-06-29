@extends('authentications.layout')

@section('content')
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="{{ url('/') }}" class="mb-12">
                <img src="{{ url('./assets/media/logo/logo-ibik-full.png') }}" alt="logo h-40px">
            </a>
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form action="{{ url('/signin') }}" autocomplete="off" method="post" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_sign_in_form">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-4">Sign In to Kantin IBIK</h1>
                        <div class="text-gray-400 fw-bold fs-4">Please use your email and password with correctly</div>
                    </div>

                    {{-- flash message --}}
                    @if(session()->has('loginerror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginerror') }}
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- end: flash message --}}

                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <label for="email" class="form-label fs-6 fw-bolder text-dark">
                            Email
                        </label>
                        <input type="text" name="email" class="form-control form-control-lg form-control-solid  @error('email') is-invalid @enderror" autofocus required value="{{ old('email') }}" />
                        @error('email')
                        <div class="fv-plugins-message-container invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <div class="d-flex flex-stack mb-2">
                            <label for="password" class="form-label fs-6 fw-bolder text-dark">Password</label>
                            <a href="#" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                        </div>

                        <input type="password" name="password" class="form-control form-control-lg form-control-solid" required />
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-center flex-column-auto p-10">
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://febryfairuz.gituhub.io/" class="text-muted text-hover-primary px-2">About</a>
                <a href="https://febryfairuz.gituhub.io/" class="text-muted text-hover-primary px-2">Contact</a>
            </div>
        </div>
    </div>
@endsection
