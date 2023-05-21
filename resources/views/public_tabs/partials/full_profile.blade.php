<div class="card mb-0 preload-img" data-src="{{asset('assets/profiles/'.$user['image'])}}" data-card-height="600">
    <div class="card-top">
        <h6 class="text-center mt-3 opacity-50 font-400">{{$user['position']}}</h6>
    </div>
    <div class="card-bottom ms-3 mb-3">
        <h1 class="font-40 line-height-xl">{{$user['first_name']}}<br>{{$user['last_name']}}</h1>
        @if($user['city'] != null || $user['country'] != null)
            <p class="pb-0 mb-0 font-12"><i class="fa fa-map-marker me-1"></i>{{$user['city']}}, {{$user['country']}}</p>
        @endif
        @foreach($about as $item)

            @if(str_replace('_', '-', app()->getLocale()) == 'fr' && $item->french_text != null)
                <p>
                    {{$item->french_text}}
                </p>
            @else
                <p>
                    {{$item->english_text}}
                </p>
            @endif
        @endforeach
    </div>
    <div class="card-overlay bg-gradient-fade-small"></div>
</div>

<div class="row mb-0 under-slider-btn">
    <div class="col-6 ps-4">
        <a href="#" class="external-link btn btn-m btn-full bg-highlight ms-4 text-uppercase rounded-m shadow-xl font-600 mb-4" data-menu="menu-contact-card">{{ __('Save Contact') }}</a>
    </div>
    <div class="col-6 pe-4">
        <a href="#" data-menu="instant-3" class="btn btn-m btn-full bg-highlight me-4 text-uppercase rounded-m shadow-xl font-600 mb-4">{{ __('Share Contact') }}</a>
    </div>
</div>
