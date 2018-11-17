<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eSignasure</title>
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
</head>
<body>
    <div class="wrapper ">
        <div class="text-right px-3 pt-3">
            <a href="#" class="btn access-button logout">Log Out</a>
        </div>
        <div class="header text-right">
            <div class="list-inline">
                <div class="list-inline-item">
                    <img class="mr-3 icon-head"  src="{{ asset('assets/image/home-icon.png') }}">
                    <img class="ml-3 icon-head"  src="{{ asset('assets/image/us.png') }}">
                </div>
                <div style="width: 220px" class="list-inline-item">
                    <span class="mr-3">01/01/2018 12:00 PM</span>
                </div>
            </div>
            {{--<div class="row text-right">--}}
                {{--<div class="col-lg-9 col-sm-8">--}}
                    {{--<img class="mr-3 icon-head"  src="{{ asset('assets/image/home-icon.png') }}">--}}
                    {{--<img class="ml-3 icon-head"  src="{{ asset('assets/image/us.png') }}">--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-sm-4 m-auto">--}}
                    {{--<span class="mr-3">01/01/2018 12:00 PM</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="container-fluid position-relative">
            <div class="brand">
                <img class="mt-3" src="{{ asset('assets/image/esign-logo.png') }}">
            </div>
            <div class="container">
                <div class="compliant-main position-relative">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="compliant-detail pt-5">
                                <h2 class="ml-5">Welcome</h2>
                                <div class="mt-5 compliant-btn">
                                    <a href="" class="btn btn-blue mr-3">Take a Tour</a>
                                    <a href="" class="btn btn-blue"><img class="manage-acc" src="{{ asset('assets/image/manage-account.png') }}"> manage Account</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="table-img text-right">
                                <img src="{{ asset('assets/image/table.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="quick-main mb-3" >
                        <div class="py-3 text-center">
                            <h4>Quick Access</h4>
                        </div>
                        <div class="d-flex justify-content-between quick-buttons">
                            <a href="#" class="btn access-button">Upload Document</a>
                            <a href="#" class="btn access-button">Sign my Document</a>
                            <a href="#" class="btn access-button">Get it Signed</a>
                            <a href="#" class="btn access-button">Send Document</a>
                            <a href="#" class="btn access-button">Message</a>
                        </div>
                    </div><!-- EO quick-main-->
                </div><!-- EO compliant-main -->
            </div>
            <div class="mt-5 quick-head">
                <div class="container">
                    {{--<div class="quick-main mb-3" >--}}
                        {{--<div class="py-3 text-center">--}}
                            {{--<h4>Quick Access</h4>--}}
                        {{--</div>--}}
                        {{--<div class="d-flex justify-content-between">--}}
                            {{--<a href="#" class="btn access-button">Upload Document</a>--}}
                            {{--<a href="#" class="btn access-button">Sign my Document</a>--}}
                            {{--<a href="#" class="btn access-button">Get it Signed</a>--}}
                            {{--<a href="#" class="btn access-button">Send Document</a>--}}
                            {{--<a href="#" class="btn access-button">Message</a>--}}
                        {{--</div>--}}
                    {{--</div><!-- EO quick-main-->--}}
                </div>
            </div>
            <div class="container">
                <div class="glance-main my-3">
                    <div class="py-3 text-center">
                        <h4>At a Glance</h4>
                    </div>
                    <div class="row glance-sub">
                        <div class="col-lg-7 col-md-12 mt-auto">
                            <h5>Transaction Updates</h5>
                        </div>
                        <div class="col-lg-5 col-md-12 glance-buttons">
                            <a href="" class="btn access-button  mr-3">My Updates</a>
                            <a href="" class="btn access-button access-button-red ">Dismiss</a>
                        </div>
                    </div>
                    <div class="row glance-sub">
                        <div class="col-lg-7 col-md-12 mt-auto">
                            <h5>Message Notification</h5>
                        </div>
                        <div class="col-lg-5 col-md-12 glance-buttons">
                            <a href="" class="btn access-button  mr-3">Click to view</a>
                            <a href="" class="btn access-button access-button-red ">Dismiss</a>
                        </div>
                    </div>
                    <div class="row glance-sub">
                        <div class="col-lg-7 col-md-12 mt-auto">
                            <h5>Account Notification & Prompts</h5>
                        </div>
                        <div class="col-lg-5 col-md-12 glance-buttons">
                            <a href="" class="btn access-button  mr-3">Click to view</a>
                            <a href="" class="btn access-button access-button-red ">Dismiss</a>
                        </div>
                    </div>
                    <div class="row glance-sub">
                        <div class="col-lg-7 col-md-12 mt-auto">
                            <h5>Paused</h5>
                        </div>
                        <div class="col-lg-5 col-md-12 glance-buttons">
                            <a href="" class="btn access-button  mr-3">Continue</a>
                            <a href="" class="btn access-button access-button-red ">Dismiss</a>
                        </div>
                    </div>
                </div><!-- EO glance-min -->
                <div class="walk-main">
                    <div class="py-3 text-center">
                        <h4>Walk-me Tutorial</h4>
                        <p>You can browse through Walk-Me Tutorials to learn about the eSignasure idea.</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-inline" style="padding-left: 28px;">
                                <li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style upload-doc cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Upload Document</a>
                                    </div>
                                </li>

                                <li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container walk-active text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style sign-doc cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Sign Document</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style get-signed cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Get it Signed</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style send-doc cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Send Document</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style create-temp cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Create Template</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style add-user cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Add User</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style set-access cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Set up Access</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style contact cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Contacts</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style recent-activity cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">Recent Activity</a>
                                    </div>
                                </li><li class="list-inline-item mx-1 my-2">
                                    <div class="walk-container text-center">
                                        <div class="walk-bg-main">
                                            <div class="bg-style new-message cmn-margin"></div>
                                        </div>
                                        <a href="" class="btn access-button mt-acc-cmn mx-3">New Messages</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- EO walk-main-->
                <div class="contact-main">
                    <div class="py-3 text-center">
                        <h4>Contact Support</h4>
                        <a href="" class="btn btn-blue suggestion my-3">Suggestions?</a>
                    </div>
                </div>
            </div>
        </div><!-- EO container-fluid -->
        <!-- EO CONTAINER-->
    </div><!-- EO MAIN DIV -->

    <!-- jQuery 3 -->
    <script src="{{ asset('js/libs/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/libs/popper.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
</body>
</html>