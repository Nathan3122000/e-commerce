@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Register Form</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="login-wrap p-0">
                {{-- <h3 class="mb-4 text-center">Creatr an account</h3> --}}
                <form action="{{ route('register') }}" class="signin-form" method="post">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger my-2 fade show">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-group col-6 col-md-4">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" placeholder="Birthdate" required value="{{ old('birthdate') }}">
                        </div>
                        <div class="form-group col-6 col-md-4">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control text-dark" style="color: black !important">
                                <option value="" disabled selected>Choose Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="password-field1">Password</label>
                            <input id="password-field1" type="password" name="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group col-6">
                            <label for="password-field">Password Confirmation</label>
                            <input id="password-field" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                        <a href="/" class="form-control btn btn-danger mt-3 px-3">Back To Home</a>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            {{-- <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label> --}}
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="{{ route('login') }}" style="color: #fff">Sign In</a>
                        </div>
                    </div>
                </form>
                {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                <div class="social d-flex text-center">
                    <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                    <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-google mr-2"></span> Google</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
