@foreach($phones as $phone)
    <a class="default-link" href="tel:{{$phone->number}}">
        <i class="fa font-15 fa-phone"></i>
        <span>{{$phone->number}}</span>
    </a>
@endforeach
