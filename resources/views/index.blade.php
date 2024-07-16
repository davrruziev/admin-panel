<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') - Admin Panel</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/admin/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/admin/assets/img/favicon.ico'/>
    @yield('css')
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                                                                                         src="assets/img/user.png"
                                                                                                         class="user-img-radious-style">
                        <span
                            class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">{{ auth()->user()->first_name }}</div>
                        <a href="profile.html" class="dropdown-item has-icon"> <i
                                class="far
										fa-user"></i> Profile
                        </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                            Activities
                        </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"><button type="submit" class="dropdown-item has-icon text-danger"><i
                                    class="fas fa-sign-out-alt"></i>Logout
                            </button></a>
                    </div>
                </li>
            </ul>
        </nav>
        @include('admin.sidebar')
        <div class="main-content">
            <section class="section">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="templateshub.net">Templateshub</a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="/admin/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="/admin/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="/admin/assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="/admin/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/admin/assets/js/custom.js"></script>
@yield('js')
<script>
    var url = window.location.href;
    var a = document.querySelectorAll("[href='" + url + "']")[0];
    a.parentElement.classList.add('active');
</script>
</body>
