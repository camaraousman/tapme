@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <img style="margin-bottom:-80px" src="{{asset('assets/profiles/'.$image)}}"
         class="mx-auto shadow-xl rounded-circle over-card" width="150">
    <div id="toast-3" class="toast toast-tiny toast-top bg-green-dark" data-bs-delay="1000" data-autohide="true"><i
            class="fa fa-check me-3"></i>{{ __('Successful') }}</div>
    <div id="toast-4" class="toast toast-tiny toast-top bg-red-dark" data-bs-delay="1000" data-autohide="true"><i
            class="fa fa-times me-3"></i>{{ __('Error') }}</div>
    <div style="padding-top:80px;" class="content">
        <h1 class="text-center font-32">{{$first_name}} {{$last_name}}</h1>
        <a href="#" class="color-highlight text-center d-block mt-n2 font-11 pb-3">{{$position}}</a>

        <!-- follow buttons-->
        <div class="content mb-0">
            <div class="row mb-0">
                <div class="col-6">
                    <a href="{{route('contacts')}}"
                       class="btn btn-full btn-m rounded-s text-uppercase font-700 bg-blue-dark">{{ __('Contacts') }}</a>
                </div>
                <div class="col-6">
                    <a href="{{url('/'.$username)}}" target="_blank"
                       class="btn btn-full btn-m rounded-s text-uppercase font-700 color-blue-dark border-blue-dark">{{ __('Preview') }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="divider mb-0"></div>
    @include('tabs.overview')
@endsection

@section('extra_script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            fetch_phones();
            fetch_emails();
            fetch_address();
            fetch_socials();
            fetch_websites();
        })

        function successToast() {
            let toastID = document.getElementById('toast-3');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }

        function errorToast() {
            let toastID = document.getElementById('toast-4');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }
    </script>
    @yield('phone_scripts')
    @yield('email_scripts')
    @yield('address_scripts')
    @yield('social_scripts')
    @yield('website_scripts')
@endsection
