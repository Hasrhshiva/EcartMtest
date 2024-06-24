@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row jumbotron box8">
              <div class="col-sm-12 mx-t3 mb-4">
                <h2 class="text-center text-info">Register</h2>
              </div>
              <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="name-l">Last name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your last name." required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              </div>
              <div class="col-sm-6 form-group">
                <label for="address-1">Address Line-1</label>
                <input type="address" class="form-control" name="Locality" id="address-1" placeholder="Locality/House/Street no." required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="address-2">Address Line-2</label>
                <input type="address" class="form-control" name="address" id="address-2" placeholder="Village/City Name." required>
              </div>
              <div class="col-sm-2 form-group">
                <label for="zip">Postal-Code</label>
                <input type="zip" class="form-control" name="Zip" id="zip" placeholder="Postal-Code." required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="Date">Date Of Birth</label>
                <input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="sex">Gender</label>
                <select id="sex" class="form-control browser-default custom-select" name="gender">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="unspesified">Unspecified</option>
                </select>
              </div>
              <div class="col-sm-2 form-group">
                <label for="cod">Country code</label>
                <select class="form-control browser-default custom-select" name="country_code">
                  <option data-countryCode="US" value="1" selected>USA (+1)</option>
                  <option data-countryCode="GB" value="44">UK (+44)</option>
        
                  <option disabled="disabled">Other Countries</option>
                  <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                  <option data-countryCode="AD" value="376">Andorra (+376)</option>
                 
                </select>
              </div>
              <div class="col-sm-4 form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Your Contact Number." required>
              </div>
              <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-sm-6 form-group">
                <label for="pass2">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              <div class="col-sm-12">
                <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                </label>
              </div>
        
              <div class="col-sm-12 d-flex justify-between form-group mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
                <a class="btn btn-link" href="{{  url('/') }}">
                    Home
                  </a>
               
              </div>
        
            </div>
          </form>
      
    </div>
</div>

@endsection
