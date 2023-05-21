<div class="content">
    <div class="card-profile ">
        <div class="card-profile-image-container">
            <img src="{{asset('assets/images/pictures/ovou-1.webp')}}" alt="Profile Image">
        </div>
        @if($user['profile'] == 1)
            <div class="card-profile-details-container">
                <h2 class="card-profile-name color-black font-30 mt-5" style="font-family:'Roboto', 'sans-serif';">{{$user['first_name']}}
                    <br> {{$user['last_name']}}</h2>
                <p class="card-profile-occupation font-13 line-height-s mt-2 p-0 font-500">{{$user['position']}}</p>
            </div>
        @endif
        @if($user['profile'] == 2)
            <div class="card-profile-details-container-dark">
                <h2 class="card-profile-name color-white font-30 mt-5" style="font-family:'Roboto', 'sans-serif';">{{$user['first_name']}}
                    <br> {{$user['last_name']}}</h2>
                <p class="card-profile-occupation font-13 line-height-s mt-2 p-0 font-500">{{$user['position']}}</p>
            </div>
        @endif
    </div>

    <!-- follow buttons-->
    <div class="row mt-4">
        <div class="col-6">
            <a href="{{url('/'.$user['username'].'_export')}}" class="btn btn-full btn-m rounded-s color-black border-gray-dark font-900 p-1" style="font-size: 12px !important;">{{ __('Save Contact') }}</a>
        </div>
        <div class="col-6">
            <a href="#" data-menu="instant-3" class="btn btn-full btn-m rounded-s font-900 color-white bg-black  p-1" style="font-size: 12px !important;">{{ __('Exchange Contact') }}</a>
        </div>
    </div>
</div>

@if($about_exists == 1)
    @include('public_tabs.partials.about')
@endif
