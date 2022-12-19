@extends('layouts.mainnn')

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>{{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <input id="email" placeholder="{{ __('Email Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
