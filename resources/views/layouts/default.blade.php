<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    <!-- header and footer bar go here-->
    @include('partials.header')
    @include('partials.bottom_menu')

    <!--start of page content, add your stuff here-->
    <div class="page-content header-clear-medium" id="app">
        <div class="card card-style">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>


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
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Toastr end -->
@include('partials.scripts')

<script>
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

@yield('extra_script')
</body>
