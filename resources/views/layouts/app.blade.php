<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>@yield('title')</title>

    <!-- Scripts ระบบจดหมายอิเล็กทรอนิกส์-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary navbar-light navbar-laravel ">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                        ระบบจดหมายอิเล็กทรอนิกส์ภายใน
                </a>-->
                    @if(Auth::check())
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            E-Office
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/') }}">
                            E-Office
                        </a>
                    @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                จดหมาย
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('mail')}}">จดหมายทั้งหมด</a>
                                <a class="dropdown-item" href="{{route('mailOut')}}">จดหมายส่งออก</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('mailWrite')}}">เขียนจดหมาย</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ระบบจอง
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">ยานพาหนะ</a>
                                <a class="dropdown-item" href="#">ห้องประชุม</a>
                                <a class="dropdown-item" href="#">อุปกรณ์คอมพิวเตอร์</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">องค์ความรู้</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ไฟล์เอกสาร</a>
                        </li>
                            @if(Auth::user()->status == "admin" || Auth::user()->status == "manager")
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        จัดการข้อมูล
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->status == "admin" )<a class="dropdown-item" href="{{ route('user') }}">ผู้ใช้งาน</a>@endif
                                        @if(Auth::user()->status == "admin" )<a class="dropdown-item" href="{{ route('group') }}">กลุ่มงาน</a>@endif
                                        @if(Auth::user()->status == "admin" || Auth::user()->status == "manager")<a class="dropdown-item" href="{{ route('km') }}">องค์ความรู้</a>@endif
                                        @if(Auth::user()->status == "admin" || Auth::user()->status == "manager")<a class="dropdown-item" href="{{ route('document') }}">ไฟล์เอกสาร</a>@endif
                                        @if(Auth::user()->status == "admin" || Auth::user()->status == "manager")<a class="dropdown-item" href="{{ route('notify') }}">ประกาศ</a>@endif
                                        @if(Auth::user()->status == "admin" )<a class="dropdown-item" href="{{ route('car') }}">ยานพาหนะ</a>@endif
                                        @if(Auth::user()->status == "admin" )<a class="dropdown-item" href="{{ route('meeting') }}">ห้องประชุม</a>@endif
                                        @if(Auth::user()->status == "admin" )<a class="dropdown-item" href="{{ route('it') }}">อุปกรณ์คอมพิวเตอร์</a>@endif
                                    </div>
                                </li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ลงชื่อเข้าใช้งาน') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                @endif
                            </li>
                        @else
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="ค้นหา..." aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
                            </form>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">ข้อมูลส่วนตัว</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ออกจากระบบ') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="col-md-2">
                {{--@if(Auth::check())--}}
                    {{--<div class="card">--}}
                        {{--asdasdasd--}}
                    {{--</div>--}}
                {{--@endif--}}
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
