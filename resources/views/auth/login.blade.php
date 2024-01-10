<x-guest-layout>
    <div class="row">

        <div class="col-lg-8 col-md-12">

        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card" style="top: 50%;">
                <div class="card-header">
                    <h3 class="box-title mb-3">Sign In</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-3 form-material"
                        id="loginform">
                        @csrf

                        <div class="form-group">
                            <div class="">
                                <input class="form-control w-100" type="email" placeholder="Email" name="email"
                                    :value="old('email')" autofocus autocomplete="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <input class="form-control" type="password" placeholder="Password" name="password"
                                    autocomplete="current-password">
                            </div>
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        @if ($errors->any())
                            <div>
                                <div class="text-warning fw-bolder">{{ __('Whoops! Something went wrong.') }}</div>
                                @foreach ($errors->all() as $error)
                                    <small class="badge bg-danger m-2">{{ $error }}</small>
                                @endforeach
                            </div>
                        @endif
                        <div class="">
                            {{--   @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif --}}

                            <button class="btn btn-primary btn-sm w-100" type="submit">LOG IN</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <x-authentication-card>
                <div class="logo">

                </div>


                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif


            </x-authentication-card> --}}
            {{-- <div id="loginform">
                <div class="logo">
                    <h3 class="box-title mb-3">Sign In</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal mt-3 form-material" id="loginform" action="index.html">
                            <div class="form-group mb-3">
                                <div class="">
                                    <input class="form-control" type="text" required="" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input class="form-control" type="password" required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="checkbox checkbox-info pt-0">
                                        <input id="checkbox-signup" type="checkbox"
                                            class="material-inputs chk-col-indigo">
                                        <label for="checkbox-signup"> Remember me </label>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="link font-weight-medium"><i
                                                class="fa fa-lock me-1"></i> Forgot pwd?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4 mb-3">
                                <div class="col-xs-12">
                                    <button
                                        class="
                    btn btn-info
                    d-block
                    w-100
                    waves-effect waves-light
                  "
                                        type="submit">
                                        Log In
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <div class="col-sm-12 justify-content-center d-flex">
                                    <p>
                                        Don't have an account?
                                        <a href="authentication-register1.html"
                                            class="text-info font-weight-medium ms-1">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    {{--   --}}

    {{-- <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material mx-2">
                <div class="form-group">
                    <label class="col-md-12 mb-0">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Johnathan Doe" class="form-control ps-0 form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="johnathan@admin.com"
                            class="form-control ps-0 form-control-line" name="example-email" id="example-email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Password</label>
                    <div class="col-md-12">
                        <input type="password" value="password" class="form-control ps-0 form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="123 456 7890" class="form-control ps-0 form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12 mb-0">Message</label>
                    <div class="col-md-12">
                        <textarea rows="5" class="form-control ps-0 form-control-line"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none border-0 ps-0 form-control-line">
                            <option>London</option>
                            <option>India</option>
                            <option>Usa</option>
                            <option>Canada</option>
                            <option>Thailand</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 d-flex">
                        <button class="btn btn-success mx-auto mx-md-0 text-white">Update
                            Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
</x-guest-layout>
