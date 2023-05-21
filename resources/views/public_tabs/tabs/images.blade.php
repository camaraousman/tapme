<div class="content">
    <h4 class="font-900 font-20 mb-0">{{__('Featured Images')}}</h4>
</div>
<div class="divider mb-0"></div>
<div class="content my-n1">
    <div class="gallery-views gallery-view-2">
        @if($image_1 != null)
            <a data-gallery="gallery-1" href="{{asset('assets/catalogues/'.$image_1)}}">
                <img src="{{asset('assets/images/empty.png')}}" data-src="{{asset('assets/catalogues/'.$image_1)}}" class="rounded-m preload-img shadow-l img-fluid" alt="img">
            </a>
        @endif
        @if($image_2 != null)
            <a data-gallery="gallery-1" href="{{asset('assets/catalogues/'.$image_2)}}">
                <img src="{{asset('assets/images/empty.png')}}" data-src="{{asset('assets/catalogues/'.$image_2)}}" class="rounded-m preload-img shadow-l img-fluid" alt="img">
            </a>
        @endif
        @if($image_3 != null)
            <a data-gallery="gallery-1" href="{{asset('assets/catalogues/'.$image_3)}}">
                <img src="{{asset('assets/images/empty.png')}}" data-src="{{asset('assets/catalogues/'.$image_3)}}" class="rounded-m preload-img shadow-l img-fluid" alt="img">
            </a>
        @endif
        @if($image_4 != null)
            <a data-gallery="gallery-1" href="{{asset('assets/catalogues/'.$image_4)}}">
                <img src="{{asset('assets/images/empty.png')}}" data-src="{{asset('assets/catalogues/'.$image_4)}}" class="rounded-m preload-img shadow-l img-fluid" alt="img">
            </a>
        @endif

    </div>
</div>
