@extends('frontend.layout.mastar')

@section('content')

    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>change password</h4>
                        <ul>
                            <li><a href="#">login</a></li>
                            <li><a href="#">change password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">


                        <div class="wsus__change_password">
                            <h4>Reseat  password</h4>

                            <div class="wsus__single_pass">
                                <label>Email</label>
                                <input type="email" placeholder="" id="email" name="email" value="{{old('email', $request->email)}}" required>
                            </div>

                            <div class="wsus__single_pass">
                                <label>New Password</label>
                                <input type="password" placeholder="New Password" id="password" name="password" required>
                            </div>

                            <div class="wsus__single_pass">
                                <label>Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" id="password_confirmation"
                                       name="password_confirmation" required>
                            </div>

                            <button class="common_btn" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
