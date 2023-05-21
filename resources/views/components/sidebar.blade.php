<!-- Sidebar 4 -->
<div id="menu-sidebar-left-4" class="bg-white menu menu-box-left" data-menu-width="310">
    <div class="divider mb-3"></div>

    <div class="me-3 ms-3">
        <div class="list-group list-custom-small list-icon-0">
            <a href="{{route('dashboard')}}">
                <i class="fa font-14 fa-home color-green-dark"></i>
                <span>{{ __('Home') }}</span>
            </a>
            <a href="{{route('media')}}">
                <i class="fa font-14 fa-camera color-teal-dark"></i>
                <span>{{ __('Media') }}</span>
            </a>
            <a href="{{route('contacts')}}" class="border-0">
                <i class="fa font-14 fa-image color-teal-dark"></i>
                <span>{{ __('Contacts') }}</span>
            </a>
            <a href="{{route('calendly.index')}}" class="border-0">
                <i class="fa font-14 fa-calendar-alt color-teal-dark"></i>
                <span>{{ __('Setup Calendly') }}</span>
            </a>
        </div>
    </div>

    @if(\App\Models\User::isAdmin())
        <div class="me-3 ms-3 mt-4 pt-2">
            <span class="text-uppercase font-900 font-11 opacity-30">{{ __('Admin') }}</span>
            <div class="me-3 ms-3">
                <div class="list-group list-custom-small list-icon-0">
                    <a href="{{route('users.index')}}">
                        <i class="fa font-14 fa-user color-teal-dark"></i>
                        <span>{{ __('Create User') }}</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="me-3 ms-3 mt-4 pt-2">
        <span class="text-uppercase font-900 font-11 opacity-30">{{ __('Account Settings') }}</span>
        <div class="me-3 ms-3">
            <div class="list-group list-custom-small list-icon-0">
                <a href="{{route('profile.edit')}}">
                    <i class="fa font-14 fa-user color-teal-dark"></i>
                    <span>{{ __('Profile') }}</span>
                </a>
            </div>

            <div class="me-3 ms-3 mt-1 pt-2">
                <div class="list-group list-custom-small list-icon-0">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="color-theme d-block pb-2">
                        {{ csrf_field() }}
                        <button><i class="fa fa-sign-out-alt"></i><span> {{ __('Logout') }}</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
