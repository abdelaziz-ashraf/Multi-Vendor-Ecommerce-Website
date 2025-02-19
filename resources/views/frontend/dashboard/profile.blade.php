@extends('frontend.dashboard.layouts.master')

@section('content')
    <div class="dashboard_content mt-2 mt-md-0">
        <h3><i class="far fa-user"></i> profile</h3>
        <div class="wsus__dashboard_profile">
            <div class="wsus__dash_pro_area">

                <div class="row">
                    <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h4>basic information</h4>
                        <div class="col-xl-9">

                                <div class="col-xl-3 col-sm-6 col-md-6">
                                    <div class="wsus__dash_pro_img">
                                        <img src="{{ auth()->user()->image ? asset(auth()->user()->image ) : asset('frontend/assets/images/ts-2.jpg') }}"
                                             alt="img" class="img-fluid w-100">
                                        <input type="file" name="image">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="text" placeholder="Name" name="name"
                                                   value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fal fa-envelope-open"></i>
                                            <input type="email" placeholder="Email" name="email"
                                                   value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-12">
                                <button class="common_btn mb-4 mt-2" type="submit">Update</button>
                            </div>
                        </form>

                    <form action="{{ route('user.password.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="wsus__dash_pass_change mt-2">
                            <h4>Password</h4>
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-unlock-alt"></i>
                                        <input type="password" placeholder="Current Password" name="old_password">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input type="password" placeholder="New Password" name="password">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="common_btn" type="submit">Change</button>
                                </div>
                            </div>
                        </div>
                    </form >
                </div>

            </div>
        </div>
    </div>

@endsection
