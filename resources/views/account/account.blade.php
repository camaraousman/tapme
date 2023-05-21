@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <div class="content mb-0">
        @include('account.upload')

        <div class="divider my-3"></div>
        @include('account.basic-information')

        <div class="divider mt-1 mb-0"></div>
        @include('account.about')

        <div class="divider my-3"></div>
        @include('account.profile-choice')

        <div class="divider my-3"></div>
        @include('account.language-choice')

        <div class="divider my-3"></div>
        @include('account.security')
    </div>

@endsection

@section('extra_script')
    <script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            fetch_all();
            fetch_abouts();
        })

        function fetch_all(){
            $.ajax({
                type: "get",
                url: "{{route('profile.fetch_all')}}",
                success: function (data) {
                    $('#name').val(data.first_name)
                    $('#surname').val(data.last_name)
                    $('#title').val(data.title)
                    $('#city').val(data.city)
                    $('#country').val(data.country)
                    $('#position').val(data.position)
                    $('#company').val(data.company)
                    $("#profile_"+data.profile).prop("checked", true);
                    $("#language_"+data.language).prop("checked", true);
                },
                error: function (request, status, error) {

                }
            });
        }
    </script>

    @yield('upload-scripts')
    @yield('basic-info-scripts')
    @yield('about_scripts')
    @yield('profile-choice-scripts')
    @yield('language-choice-scripts')
    @yield('security-scripts')
@endsection
