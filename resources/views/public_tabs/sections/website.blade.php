<div class="divider my-2"></div>
<div class="content mt-0">
    <h4 class="font-900 font-20">{{__('Websites')}}<i class="fa fa-globe float-end font-16 pt-1"></i></h4>
    @foreach($websites as $website)
        <a href="{{$website->url}}" target="_blank" class="default-link d-flex">
            <div>
                <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{__('URL')}}</span>
                <span class="default-link d-block color-theme font-15 font-400">{{$website->url}}</span>
            </div>
        </a>
    @endforeach
</div>
