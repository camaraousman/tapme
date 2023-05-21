<!DOCTYPE HTML>
<html lang="en">
@include('partials.head')

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    <!-- header and footer bar go here-->
{{--    @include('partials.header')--}}
    @include('partials.bottom_menu')

    <!--start of page content, add your stuff here-->
{{--    <div class="page-content">--}}
        @yield('content')
{{--    </div>--}}


    <!--end of page content, off canvas elements ( menus / action sheets / modals / toasts / snackbars here-->
    <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m">
        @yield('off_canvas_elements')
    </div>


    <!-- All Menus, Action Sheets, Modals, Notifications, Toasts get Placed outside the <div class="page-content"> -->
    @include('components.menu_settings')
    @include('components.language-picker')
    @include('components.sidebar')


    <!-- Menu Settings Highlights-->
    @include('components.menu_highlights')

    <!-- Menu Settings Backgrounds-->
    @include('components.menu_background')

    <!-- Menu Share -->
    @include('components.menu_share')

    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    @include('components.prompt_android')

    <!-- Install instructions for iOS -->
    @include('components.prompt_ios')
    <!--end of div id page-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('partials.scripts')
@yield('extra_script')
</body>
