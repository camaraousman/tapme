<div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
    <div class="menu-title mt-0 pt-0"><h1>{{__('Settings')}}</h1><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
    <div class="divider divider-margins mb-n2"></div>
    <div class="content">
        <div class="list-group list-custom-small">
            <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                <span>{{__('Dark Mode')}}</span>
                <div class="custom-control scale-switch ios-switch">
                    <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode">
                    <label class="custom-control-label" for="switch-dark-mode"></label>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
        </div>
        <div class="list-group list-custom-large">
            <a data-menu="menu-highlights" href="#">
                <i class="fa font-14 fa-tint bg-green-dark rounded-s"></i>
                <span>{{__('Font colors')}}</span>
                <i class="fa fa-angle-left"></i>
            </a>
            <a data-menu="menu-backgrounds" href="#" class="border-0">
                <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                <span>{{__('Background Color')}}</span>
                <i class="fa fa-angle-left"></i>
            </a>
        </div>
    </div>
</div>


