@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="header-title-container">
                <h3 class="header-text">Dashboard</h3>
            </section>
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-block btn-primary btn-common">Take a Tour</button>
            </div>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <div class="pull-left">
                            <h3 class="box-title">At a Glance</h3>
                        </div>
                        <div class="pull-right">
                            <div class="dismiss-btn">Dismiss All</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.box-header -->
                    <div>
                        <!-- transaction notifications -->
                        <div class="notification-wrapper line-blue">
                            <div class="notification-title-text">Transaction Updates</div>
                            <div>
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Signed: 01/01/2018</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-5">
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Signed: 01/02/2018</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        {{--Message notification--}}
                        <div class="notification-wrapper line-yellow">
                            <div class="notification-title-text">Message Notification</div>
                            <div>
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Sent you message</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">View</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-5">
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Replied</div>
                                </div>

                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">View</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        {{--Account notification / Pormpts--}}
                        <div class="notification-wrapper line-blue">
                            <div class="notification-title-text">Account notification / Pormpts</div>
                            <div>
                                <div class="pull-left">
                                    <div class="notification-text">Updated billing information needed</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">View</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-5">
                                <div class="pull-left">
                                    <div class="notification-text">3 Days</div>
                                </div>

                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">View</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-5">
                                <div class="pull-left">
                                    <div class="notification-text">Create Profile</div>
                                </div>

                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">View</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        {{--Paused--}}
                        <div class="notification-wrapper line-yellow">
                            <div class="notification-title-text">Paused</div>
                            <div>
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Sent you message</div>
                                </div>
                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">Complete</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-5">
                                <div class="pull-left">
                                    <div class="notification-text">sample@example.com: Replied</div>
                                </div>

                                <div class="pull-right">
                                    <div class="dismiss-btn">Dismiss</div>
                                </div>
                                <div class="pull-right">
                                    <div class="view-btn">Complete</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border text-center" style="padding: 10px">
                        <img class="img" src="assets/image/explation.png">
                        <p>Continue where you Left off?</p>
                        <button type="button" class="btn btn-default" style="border-radius: 14px; width: 80px;">yes</button>
                        <button  type="button" class="btn btn-default" style="border-radius: 14px; width: 80px;      margin-left: 6px">No</button>
                    </div>
                </div>
            </div>
        </div>
            <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Walk-Me Tutorial</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/upload.png">Upload Document
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/sign.png"> Sign
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/getitsigned.png"> Get it Signed!
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/send.png"> Send Document
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/createtemplete.png"> Create Template
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/adduser.png">Add User
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/setupaccess.jpg">Set Up Access
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/contacts.png"> Contacts
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/activity.png"> Recent Activity
                            </div>
                        </div>
                        <div class="walk-me-btn-container">
                            <div class="walk-btn-box">
                                <img class="img" src="assets/image/message.png"> New Messages
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <!-- /.content -->
        </div>
        <div class="">
            <div class="box box-solid">
                <div class="home-btn-box-padding">
                    <div class="menu-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Manage Accounts</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Sign My document</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Manage Contacts</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Get It signed!</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">My Files</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Manage Access</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common">Transaction History</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per btn-common" >Messages </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>
@stop


