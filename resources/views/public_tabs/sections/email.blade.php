@foreach($emails as $email)
    <a class="default-link" href="mailto:{{$email->email}}">
        <i class="fa font-15 fa-envelope"></i>
        <span>{{$email->email}}</span>
    </a>
@endforeach
