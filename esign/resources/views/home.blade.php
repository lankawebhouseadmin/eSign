@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-2">
                <button type="button" class="btn btn-block btn-primary">Take a Tour</button>
            </div>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border" style="padding: 10px;">
                        {{--<i class="fa fa-text-width"></i>--}}

                        <h3 class="box-title" style="float: left">At a Glance</h3>
                        <div class="box-header" style="float: right; font-size: 18px">
                            <h5 style="float: right ; border-left: solid">Dismiss All</h5>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <blockquote>
                            <p>Transaction Updates</p>
                            <small style="float: left">sample@example.com <cite title="Source Title">Source Title</cite>
                            </small>
                            <div class="box-body">
                                <h5 style="float: right; border-left: solid; margin-top: -9px;">Dismiss</h5>
                            </div>
                        </blockquote>
                    </div>
                    <div class="box-body">
                        <blockquote>
                            <p>Message Notification</p>
                            <small>sample@example.com<cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>
                    <!-- /.box-body -->
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
                <div class="box box-default">
                    <div class="box-header with-border" style="padding: 10px">
                        {{--<i class="fa fa-warning"></i>--}}

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
        <div class="container-fluid">
            <div class="box box-default">
                <div class="box-body">
                    <div class="menu-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Manage Accounts</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Sign My document</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Manage Contacts</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Get It signed!</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">My Files</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Manage Access</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per">Transaction History</button>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary width100per" >Messages </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>
@stop


