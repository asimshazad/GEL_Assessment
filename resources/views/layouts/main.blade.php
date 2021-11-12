<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}    " id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <div class="navbar-brand-box">


                        <a href="{{ route('home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="https://profilersuzanne.com/wp-content/uploads/2018/02/logo-dummy.png" alt="" height="50">
                            </span>
                            <span class="logo-lg">
                                <img src="https://profilersuzanne.com/wp-content/uploads/2018/02/logo-dummy.png" alt="" height="50">
                            </span>
                        </a>


                    </div>


                </div>

            </div>
        </header>
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('companies.index') }}" class="waves-effect">
                                <i class="bx bx-briefcase-alt-2"></i>
                                <span key="t-invoices">Companies</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('employees.index') }}" class="waves-effect">
                                <i class="bx bxs-user-detail"></i>
                                <span key="t-contacts">Employees</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="waves-effect"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="bx bx-log-out"></i>
                                <span key="t-logout">Logout</span>
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            


                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>
</body>

</html>