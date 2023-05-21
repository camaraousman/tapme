<div class="content mt-2">
    <h4 class="font-900 font-20">{{__('Address Information')}}<i class="fa fa-address-card float-end font-16 pt-1"></i></h4>

    @foreach($addresses as $address)
        @if($address->has_map == 1)
            <a href="{{$address->url}}" class="default-link d-flex" target="_blank">
                <div>
{{--                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">Headquarters</span>--}}
                    <span class="default-link d-block color-theme font-15 font-400">{{$address->address}}</span>
                </div>
                <div class="ms-auto">
                    <i class="fa fa-map-marker color-theme opacity-30 pt-4 mt-3"></i>
                </div>
            </a>
        @else
            <div>
{{--                <span class="font-11 d-block mb-n2 opacity-50 color-theme">Headquarters</span>--}}
                <span class="default-link d-block color-theme font-15 font-400">{{$address->address}}</span>
            </div>
        @endif
    @endforeach
</div>
