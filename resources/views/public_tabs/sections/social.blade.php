<div class="content mt-0">
    <div class="divider"></div>
    <h4 class="font-900 font-20">{{__('Social Media')}}<i class="fa fa-thumbs-up float-end font-16 pt-1"></i></h4>
    <div class="row mt-3">
        @foreach($socials as $social)
            @if($social->slug == 'facebook')
                <div class="col-3">
                    <a href="{{$social->url}}" target="_blank"><i class="font-35 fab fa-facebook-f color-facebook mx-1"></i></a>
                </div>
            @endif
            @if($social->slug == 'instagram')
                <div class="col-3">
                    <a href="{{$social->url}}" target="_blank"><i class="font-40 fab fa-instagram color-instagram mx-1"></i></a>
                </div>
            @endif
            @if($social->slug == 'twitter')
                <div class="col-3">
                    <a href="{{$social->url}}" target="_blank"><i class="font-40 fab fa-twitter color-twitter mx-1"></i></a>
                </div>
            @endif
            @if($social->slug == 'linkedin')
                <div class="col-3">
                    <a href="{{$social->url}}" target="_blank"><i class="font-40 fab fa-linkedin color-linkedin mx-1"></i></a>
                </div>
            @endif
        @endforeach
    </div>
</div>
