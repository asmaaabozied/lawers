<!DOCTYPE html>
<html lang="en">
@include('partials._head')
@section('title', 'الداشبورد')

<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

@include('partials._nav')
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

@include('partials._sidebar')
<!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing" id="app">
                @yield('content')
            </div>

        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">جميع الحقوق محفوظة ل © 2020 <a target="_blank" href="https://designreset.com">Q8intouch</a></p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">بُرمجت بكل
                    <i data-feather="heart"></i>
                </p>
            </div>
        </div>
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->
@include('partials._footer')
@include('sweetalert::alert')

@stack('javascript')
</body>
</html>
