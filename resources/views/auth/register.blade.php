@include('layouts.header')

    <!-- Register FORM -->

    <section class="login_form_sec">
        <div class="container-fluid">
            <div class="login_form_details">
                <h2>-- Register TO TEXTILE EXPORT --</h2>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name </label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter your First Name" id="firstname" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name </label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter your Last Name" id="lastname" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" id="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter your Confirm Password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Mobile No. </label>
                        <input type="text" class="form-control @error('Phone') is-invalid @enderror" placeholder="Enter your Mobile Number" name="Phone" id="Phone" value="{{ old('Phone') }}" required autocomplete="Phone">
                        @error('Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </form>
                <div class="form_forget_pass">
                    <!-- <div>
                       <a href="#"> Forgot Password?</a>
                    </div> -->
                    <div>
                        <a href="{{ route('login') }}">Login!</a>
                     </div>
                </div>
            </div>
        </div>
    </section>

   



<!-- <content class="float-left w-100 " id="content" >

    <section class="section-1 section-product-details float-left w-100">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header text-center">{{ __('Register') }}</div>



                            <div class="card-body">

                                <form method="POST" action="{{ route('register') }}">

                                    @csrf



                                    <div class="form-group row">

                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>



                                        <div class="col-md-6">

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>



                                            @error('name')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row">

                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>



                                        <div class="col-md-6">

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">



                                            @error('email')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row">

                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>



                                        <div class="col-md-6">

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">



                                            @error('password')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row">

                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>



                                        <div class="col-md-6">

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="Phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>



                                        <div class="col-md-6">

                                            <input id="Phone" type="text" class="form-control @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone">



                                            @error('Phone')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>



                                        <div class="col-md-6">

                                            <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ old('Address') }}" required autocomplete="Address">



                                            @error('Address')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>



                                        <div class="col-md-6">

                                            <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ old('City') }}" required autocomplete="City">



                                            @error('City')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="Country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>



                                        <div class="col-md-6">

                                            <input id="Country" type="text" class="form-control @error('Country') is-invalid @enderror" name="Country" value="{{ old('Country') }}" required autocomplete="Country">



                                            @error('Country')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="Postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>



                                        <div class="col-md-6">

                                            <input id="Postcode" type="text" class="form-control @error('Postcode') is-invalid @enderror" name="Postcode" value="{{ old('Postcode') }}" required autocomplete="Postcode">



                                            @error('Postcode')

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $message }}</strong>

                                                </span>

                                            @enderror

                                        </div>

                                    </div>



                                    <div class="form-group row mb-0">

                                        <div class="col-md-6 offset-md-4">

                                            <button type="submit" class="btn btn-primary">

                                                {{ __('Register') }}

                                            </button>

                                        </div>

                                        <p>Login For Register User <a href="{{ route('login') }}">Login</a></p>

                                    </div>

                                </form>

                            </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</content> -->

@include('layouts.footer')

