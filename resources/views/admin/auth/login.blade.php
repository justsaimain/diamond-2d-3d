@extends('admin.auth.app')
@section('title', 'Login')
@section('content')
    <div class="card login-box-container">
        <div class="card-body">
            <div class="authent-logo">
                <img src="{{ asset('assets/images/logo@2x.png') }}" alt="">
            </div>
            <div class="authent-text">
                <p>Welcome to Circl</p>
                <p>Please Sign-in to your account.</p>
            </div>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                </div>
            </form>
        </div>
    </div>
@endsection
