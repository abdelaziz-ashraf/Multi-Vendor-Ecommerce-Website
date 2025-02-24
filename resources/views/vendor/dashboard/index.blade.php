@extends('vendor.layouts.master')

@section('content')

    <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <div class="dashboard_content">
            <div class="wsus__dashboard">
                <div class="row">
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item red" href="dsahboard_order.html">
                            <i class="far fa-address-book"></i>
                            <p>order</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item green" href="dsahboard_download.html">
                            <i class="fal fa-cloud-download"></i>
                            <p>download</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
                            <i class="fas fa-star"></i>
                            <p>review</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item blue" href="dsahboard_wishlist.html">
                            <i class="far fa-heart"></i>
                            <p>wishlist</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item orange" href="dsahboard_profile.html">
                            <i class="fas fa-user-shield"></i>
                            <p>profile</p>
                        </a>
                    </div>
                    <div class="col-xl-2 col-6 col-md-4">
                        <a class="wsus__dashboard_item purple" href="dsahboard_address.html">
                            <i class="fal fa-map-marker-alt"></i>
                            <p>address</p>
                        </a>
                    </div>
                </div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
