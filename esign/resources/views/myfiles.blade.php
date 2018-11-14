@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <section class="header-title-container">
                <h3 class="header-text">My Files</h3>
            </section>
        <!-- Content Header (Page header) -->
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-block btn-primary btn-common">Take a Tour</button>
            </div>
            {{--<div class="col-md-6">--}}
                {{--<div class="box box-solid">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<div class="pull-left">--}}
                            {{--<h3 class="box-title">At a Glance</h3>--}}
                        {{--</div>--}}
                        {{--<div class="pull-right">--}}
                            {{--<div class="dismiss-btn">Dismiss All</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-header -->--}}
                    {{--<div>--}}
                        {{--<!-- transaction notifications -->--}}
                        {{--<div class="notification-wrapper line-blue">--}}
                            {{--<div class="notification-title-text">Transaction Updates</div>--}}
                            {{--<div>--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Signed: 01/01/2018</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="mt-5">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Signed: 01/02/2018</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--Message notification--}}
                        {{--<div class="notification-wrapper line-yellow">--}}
                            {{--<div class="notification-title-text">Message Notification</div>--}}
                            {{--<div>--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Sent you message</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">View</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="mt-5">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Replied</div>--}}
                                {{--</div>--}}

                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">View</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--Account notification / Pormpts--}}
                        {{--<div class="notification-wrapper line-blue">--}}
                            {{--<div class="notification-title-text">Account notification / Pormpts</div>--}}
                            {{--<div>--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">Updated billing information needed</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">View</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="mt-5">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">3 Days</div>--}}
                                {{--</div>--}}

                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">View</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="mt-5">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">Create Profile</div>--}}
                                {{--</div>--}}

                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">View</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--Paused--}}
                        {{--<div class="notification-wrapper line-yellow">--}}
                            {{--<div class="notification-title-text">Paused</div>--}}
                            {{--<div>--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Sent you message</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">Complete</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                            {{--<div class="mt-5">--}}
                                {{--<div class="pull-left">--}}
                                    {{--<div class="notification-text">sample@example.com: Replied</div>--}}
                                {{--</div>--}}

                                {{--<div class="pull-right">--}}
                                    {{--<div class="dismiss-btn">Dismiss</div>--}}
                                {{--</div>--}}
                                {{--<div class="pull-right">--}}
                                    {{--<div class="view-btn">Complete</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.box -->--}}
            {{--</div>--}}
            <div class="col-md-9">
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

        </div>
    </div>
@stop


