@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <div class="content text-center">
        <p>
            {{__("Scan the QR code below to check my profile. Leave me a message and I will reach out.")}}
        </p>
        <img href="{{url('/'.$username)}}" width="200" class="qr-image generate-qr-auto mx-auto polaroid-effect shadow-l mb-3" src="">
    </div>
@endsection

@section('extra_script')

    <script>
        var username = '{{$username}}';
        var url = '{{url("/")}}'+'/'+username;

        //QR Generator
        var qr_image = document.querySelectorAll('.qr-image');
        if(qr_image.length){
            var qr_this = url;
            var qr_auto = document.getElementsByClassName('generate-qr-auto')[0];
            var qr_api_address = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=';
            if(qr_auto){qr_auto.setAttribute('src', qr_api_address+qr_this)}
            var qr_btn = document.getElementsByClassName('generate-qr-button')[0];
            if(qr_btn){
                qr_btn.addEventListener('click',function(){
                    var get_qr_url = document.getElementsByClassName('qr-url')[0].value;
                    var qr_api_address = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=';
                    var qr_img = '<img class="mx-auto polaroid-effect shadow-l mt-4 delete-qr" width="200" src="'+qr_api_address+get_qr_url+'" alt="img"><p class="font-11 text-center mb-0">'+get_qr_url+'</p>'
                    document.getElementsByClassName('generate-qr-result')[0].innerHTML = qr_img
                    qr_btn.innerHTML = "Generate New Button"
                })
            }
        }

        if (window.location.protocol === "file:"){
            var linksLocal = document.querySelectorAll('a');
            linksLocal.forEach(el => el.addEventListener('mouseover', event => {
                // console.log("You are seeing these errors because your file is on your local computer. For real life simulations please use a Live Server or a Local Server such as AMPPS or WAMPP or simulate a  Live Preview using a Code Editor like http://brackets.io (it's 100% free) - PWA functions and AJAX Page Transitions will only work in these scenarios.");
            }));
        }
    </script>
@endsection

