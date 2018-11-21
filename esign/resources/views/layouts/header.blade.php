<?php
    // @TODO:: this is temp solution due to lack of time, please find with valid standard
    $fullUrl = Request::path();
    $subUrl = explode('/', $fullUrl);
    $url = $subUrl[0];
?>
<div class="header-wrapper">
    <div class="brand-header {{ $url == 'home' ? 'd-none' : '' }}">
        <a href="{{ route('home') }}"><img class="mt-3" src="{{ asset('assets/image/esign-logo.png') }}"></a>
    </div>
    <div class="text-right px-3 pt-3">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
           class="btn access-button main-btn logout font-blue-light-14">Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <div class="header text-right">
        <div class="list-inline">
            {{--<div class="list-inline-item">--}}
            {{--<img class="icon-head"  src="{{ asset('assets/image/home-icon.png') }}">--}}
            {{--<img class="ml-3 icon-head"  src="{{ asset('assets/image/us.png') }}">--}}
            {{--</div>--}}
            <div class="list-inline-item">
                {{--HOME MENU--}}
                <div class="menu-wrapper">
                    <a href="{{ route('home') }}" class="circle">
                        <img class="icon-head" src="{{ asset('assets/image/home.png') }}">
                    </a>
                    <div class="menu-text">Home</div>
                </div>

                {{--HOME MENU--}}
                <div class="menu-wrapper">
                    <a href="{{ route('myfiles') }}" class="circle">
                        <img class="icon-head" src="{{ asset('assets/image/home.png') }}">
                    </a>
                    <div class="menu-text">My Files</div>
                </div>
                {{--PROFILE MENU--}}
                <div class="menu-wrapper">
                    <a href="#" class="circle">
                        <img class="icon-head" src="{{ asset('assets/image/profile.png') }}">
                    </a>
                    <div class="menu-text">Profile</div>
                </div>
            </div>
            <div class="list-inline-item time-container">
                <span class="mr-3 font-blue-light-14">01/01/2018 12:00 PM</span>
            </div>
        </div>
    </div>
</div>
