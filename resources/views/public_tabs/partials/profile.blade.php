<div class="card card-style mb-0" style="background-image: url({{asset('assets/profiles/'.$user['image'])}}); margin-top: 20px;" data-card-height="400">
    <div class="card-bottom p-3">
        <h1 class="color-white font-40">{{$user['first_name']}} {{$user['last_name']}}</h1>

        @if($user['city'] != null || $user['country'] != null)
            <p class="pb-0 mb-0 font-12"><i class="fa fa-map-marker me-1"></i>{{$user['city']}}, {{$user['country']}}</p>
        @endif
        <p class="color-white opacity-70">
            {{$user['position']}}
        </p>
    </div>
    <div class="card-overlay bg-gradient"></div>
    <div class="card-overlay bg-gradient fa-rotate-180 opacity-20"></div>
</div>

<div class="row mb-0 under-slider-btn">
    <div class="col-6 ps-4">
        <a href="#" class="external-link btn btn-m btn-full bg-highlight ms-4 text-uppercase rounded-m shadow-xl font-600 mb-4" data-menu="menu-contact-card">{{ __('Save Contact') }}</a>
    </div>
    <div class="col-6 pe-4">
        <a href="#" data-menu="instant-3" class="btn btn-m btn-full bg-highlight me-4 text-uppercase rounded-m shadow-xl font-600 mb-4">{{ __('Share Contact') }}</a>
    </div>
</div>

@if($about_exists == 1)
    @include('public_tabs.partials.about')
@endif


@section('test-scripts')
    <script>
        function openfb(){
            var url = "instagram://user?username=ousman_faye_camara"; // The URL scheme for opening a Facebook profile in the app
            window.location.href = url; // Navigate to the URL
        }
    </script>
@endsection
