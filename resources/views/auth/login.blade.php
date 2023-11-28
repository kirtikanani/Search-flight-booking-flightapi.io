@include('layouts.header')
  <!-- LOGIN FORM -->

  <section class="login_form_sec">
        <div class="container-fluid">
            <div class="login_form_details">
                <h2>-- LOGIN TO TEXTILE EXPORT --</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" id="password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">login</button>
                </form>
                <div class="form_forget_pass">
                    <div>
                       <a href="{{ route('password.request') }}"> Forgot Password?</a>
                    </div>
                    <div>
                        <a href="{{ route('register') }}"> Create Account!</a>
                     </div>
                </div>
            </div>
        </div>
    </section>
@include('layouts.footer')
