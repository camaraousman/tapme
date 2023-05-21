<img style="margin-bottom:-80px" src="{{asset('assets/profiles/'.$user['image'])}}" class="mx-auto shadow-xl rounded-circle over-card" width="150">

<div style="padding-top:80px;" class="content mb-0">
        <h1 class="text-center font-32">{{$user['first_name']}} {{$user['last_name']}}</h1>
        <a href="#" class="color-highlight text-center d-block mt-n2 font-11 pb-1">{{$user['position']}}</a>

    <!-- follow buttons-->
        <div class="row mt-4">
            <div class="col-6">
                <a href="#" class="btn btn-full btn-m rounded-s color-blue-dark border-blue-dark font-700 p-1" data-menu="menu-contact-card">{{ __('Save Contact') }}</a>
            </div>
            <div class="col-6">
                <a href="#" data-menu="instant-3" class="btn btn-full btn-m rounded-s font-700 color-blue-dark bg-blue-dark  p-1">{{ __('Share Contact') }}</a>
            </div>
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
