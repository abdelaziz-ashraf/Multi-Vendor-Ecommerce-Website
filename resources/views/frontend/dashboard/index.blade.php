@extends('frontend.dashboard.layouts.master')

@section('content')

    @include('frontend.dashboard.layouts.nav')

    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__message">
                <h4>message</h4>
                <div class="wsus__message_single">
                    <div class="wsus__message_img">
                        <img src="images/ts-1.jpg" alt="img">
                    </div>
                    <div class="wsus__message_text">
                        <h6>Mary Smith</h6>
                        <span>22 Minutes ago</span>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam quae natus sapiente est ex
                            quaerat, cupiditate consectetur explicabo, libero, ipsa ab odit placeat quam ut voluptatem
                            aliquid voluptatibus voluptates
                            cumque. In vel veritatis veniam et nemo iusto ad ipsum adipisci cupiditate nesciunt impedit,
                            corrupti illum.</p>
                    </div>
                    <div class="wsus__message_icon">
                        <span><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
                <div class="wsus__message_single">
                    <div class="wsus__message_img">
                        <img src="images/ts-2.jpg" alt="img">
                    </div>
                    <div class="wsus__message_text">
                        <h6>susan singh</h6>
                        <span>10 Minutes ago</span>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt nemo error ratione odit
                            recusandae nihil voluptas voluptatum? Repellat odio cum molestias quasi quaerat labore
                            molestiae iste officia? Facilis, doloremque repellat.</p>
                    </div>
                    <div class="wsus__message_icon">
                        <span><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
                <div class="wsus__message_single">
                    <div class="wsus__message_img">
                        <img src="images/ts-3.jpg" alt="img">
                    </div>
                    <div class="wsus__message_text">
                        <h6>Mary Smith</h6>
                        <span>40 Minutes ago</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem asperiores, voluptatibus
                            tenetur, dolorum inventore architecto nisi commodi eaque ad cumque.</p>
                    </div>
                    <div class="wsus__message_icon">
                        <span><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
            </div>
            <div class="wsus__message">
                <h4>personal information</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="wsus__single_inout">
                                <label>first name</label>
                                <input type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="wsus__single_inout">
                                <label>last name</label>
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="wsus__single_inout">
                                <label>email</label>
                                <input type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="wsus__single_inout">
                                <label>phone</label>
                                <input type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__single_inout">
                                <label>Address</label>
                                <textarea cols="3" rows="3" placeholder="Write Your Address Here"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="wsus__single_inout">
                                <label>about yourself</label>
                                <textarea cols="3" rows="3" placeholder="Write About Yourself"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="common_btn" type="submit">update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
