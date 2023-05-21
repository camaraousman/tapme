<div class="header header-fixed header-logo-app">
    <a href="{{config('app.name')}}" class="header-icon header-icon-1 m-3"><img width="60" height="35" src="{{asset('assets/images/logo/black.png')}}" /></a>
    @if($current_locale == 'fr')
        <a href="#" class="header-icon header-icon-2" data-menu="menu-modal-language"><img width="20" src="{{asset('assets/images/flags/United-States.png')}}"></a>
    @endif

    @if($current_locale == 'en')
        <a href="#" class="header-icon header-icon-2" data-menu="menu-modal-language"><img width="20" src="{{asset('assets/images/flags/France.png')}}"></a>
    @endif
{{--    <a href="#" data-toggle-theme class="header-icon header-icon-2"><i class="fas fa-lightbulb"></i></a>--}}
{{--    <button type="button" id="header-3" data-menu="menu-settings" class="header-icon header-icon-3"><i class="fa fa-cog"></i></button>--}}
</div>
