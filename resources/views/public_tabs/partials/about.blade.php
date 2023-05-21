<div class="content mt-0">
    <h4 class="font-900 font-20">{{ __('About') }}<i class="fa fa-info-circle float-end font-16 pt-1"></i></h4>

    @foreach($about as $item)

        @if(str_replace('_', '-', app()->getLocale()) == 'fr' && $item->french_text != null)
            <p class="font-15 line-height-s">
                {{$item->french_text}}
            </p>
        @else
            <p class="font-15 line-height-s">
                {{$item->english_text}}
            </p>
        @endif
    @endforeach
</div>

