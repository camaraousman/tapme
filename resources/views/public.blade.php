<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('public_tabs.partials.head')
<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default" >

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    <!-- Begin Page Content-->
        <div class="card" style="margin-bottom: 0 !important; height: 100% !important;">

            @if($user['profile'] == 1)
                <div class="header-container">
                    <div class="public-header">
                        <a href="{{config('app.name')}}"><img width="90" height="40" src="{{asset('assets/images/logo/white.png')}}" /></a>
                        <div class="public-header-right">
                            <a href="#" class="mx-3" data-menu="menu-modal-language"><i class="fa fa-language color-white font-21"></i></a>
                            <a class="get-your-card btn btn-s rounded-s color-black border-gray-dark font-900 p-1" href="https://tapme.ma/" target="_blank">{{__('Get Your Card')}}</a>
                        </div>
                    </div>
                </div>
            @endif

            @if($user['profile'] == 2)
                <div class="header-container-dark">
                    <div class="public-header">
                        <a href="{{config('app.name')}}"><img width="90" height="40" src="{{asset('assets/images/logo/white.png')}}" /></a>
                        <div class="public-header-right">
                            <a href="#" class="mx-3" data-menu="menu-modal-language"><i class="fa fa-language color-white font-21"></i></a>
                            <a class="get-your-card btn btn-s rounded-s color-black border-gray-dark font-900 p-1" href="https://tapme.ma/" target="_blank">{{__('Get Your Card')}}</a>
                        </div>
                    </div>
                </div>
            @endif

{{--            @if($user['profile'] == 1)--}}
{{--                @include('public_tabs.partials.profile')--}}
{{--            @endif--}}
{{--            @if($user['profile'] == 2)--}}
{{--                @include('public_tabs.partials.full_profile')--}}
{{--            @endif--}}

{{--            @if($user['profile'] == 3)--}}
{{--                @include('public_tabs.partials.classic_profile')--}}
{{--            @endif--}}

            @include('public_tabs.partials.card_profile')

            @if($socials_exists == 1)
                @include('public_tabs.sections.social')
            @endif

            @if($phones_exists || $emails_exists == 1)
            <div class="content mt-0">
                <h4 class="font-900 font-20">{{ __('Contact Infomation') }}<i class="fa fa-contact-book float-end font-16 pt-1"></i></h4>
                <div class="list-group list-custom-small">
                    @if($phones_exists == 1)
                        @include('public_tabs.sections.phone')
                    @endif

                    @if($emails_exists == 1)
                        @include('public_tabs.sections.email')
                    @endif
                </div>
            </div>
            @endif

            @if($addresses_exists == 1)
                @include('public_tabs.sections.address')
            @endif

            @if($websites_exists == 1)
                @include('public_tabs.sections.website')
            @endif

            @if($images_exists)
                <div class="divider my-3"></div>
                @include('public_tabs.tabs.images')
            @endif
    </div>
        <!-- End of Page Content-->
{{--        @include('public_tabs.partials.footer')--}}


    @include('public_tabs.components.menu-contact-card')
    @include('public_tabs.components.contact-form-1')
    @include('public_tabs.components.language-menu')
</div>

<!-- Calendly badge widget begin -->
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<!-- Calendly badge widget end -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Toastr end -->
@include('partials.scripts')
<script>
    const locale = '{{ str_replace('_', '-', app()->getLocale()) }}';
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-full-width",
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

    var user_id = '{{$user['id']}}';
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        calendly_init();
    })
    function calendly_init() {
        $.ajax({
            type: "post",
            url: "{{route('public.get_calendly')}}",
            data: {user_id: user_id},
            success: function (data) {
                if(data.calendly_exists == 1){
                    if(locale == 'fr' && data.french_text != null){
                        Calendly.initBadgeWidget({ url: data.url, text: data.french_text, color: '#0069ff', textColor: '#ffffff', branding: false });
                        return;
                    }

                    Calendly.initBadgeWidget({ url: data.url, text: data.english_text, color: '#0069ff', textColor: '#ffffff', branding: false });
                }
            },
            error: function (request, status, error) {
                console.log('calendly error')
            }
        });
    }

</script>
@yield('vcard-scripts')
@yield('contact-scripts')
</body>
