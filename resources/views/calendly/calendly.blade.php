@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <div class="content mt-4 mb-4">
        <div class="input-style has-borders no-icon validate-field mb-4">
            <input type="url" class="form-control validate-text" id="url" placeholder="{{__('Enter Calendly Url')}}">
            <label for="form44" class="color-highlight">{{__('Calendly Url')}}</label>
            <i class="fa fa-times disabled invalid color-red-dark"></i>
            <i class="fa fa-check disabled valid color-green-dark"></i>
            <em>(required)</em>
        </div>

        <div class="divider my-3"></div>

        <div class="input-style input-style-always-active has-borders validate-field">
            <input type="text" id="english_text" placeholder="Example: Schedule a meeting with me" maxlength="35">
            <label for="form7" class="color-highlight">{{__('English Text to be displayed')}}</label>
            <em class="mt-n3">({{__('optional')}})</em>
        </div>

        <div id="add_office_div" class="mb4">
            <div class="d-flex no-effect"
                 data-trigger-switch="toggle-add-about"
                 data-bs-toggle="collapse"
                 href="#office_add"
                 role="button"
                 aria-expanded="false"
                 aria-controls="office_add">
                <a href="#" id="toggle-add-about">{{__('Add French translation')}}</a>

            </div>
            <div class="collapse" id="office_add">
                <div class="divider my-3"></div>
                <div class="input-style input-style-always-active has-borders validate-field">
                    <input type="text" id="french_text" placeholder="Exemple: Planifier une réunion avec moi" maxlength="35">
                    <label for="form7" class="color-highlight">{{__('French Text to be displayed')}}</label>
                    <em class="mt-n3">({{__('optional')}})</em>
                </div>
            </div>
        </div>

        <div class="col-4 ps-1">
            <button onclick="store()" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-900 border-blue-dark color-blue-dark bg-theme">
                {{__('Store')}}
            </button>
        </div>
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
            fetch_calendly();
        })

        function fetch_calendly(){
            $.ajax({
                type: "get",
                url: "{{route('calendly.fetch_all')}}",
                success: function (data) {
                    $('#url').val(data.url)
                    $('#english_text').val(data.english_text)
                    $('#french_text').val(data.french_text)
                },
                error: function (request, status, error) {
                    console.log('error')
                }
            });
        }
        function store(){
            $.ajax({
                type: "post",
                url: "{{route('calendly.store')}}",
                data: {
                    url: $('#url').val(),
                    english_text: $('#english_text').val(),
                    french_text: $('#french_text').val(),
                },
                success: function (data) {
                    toastr.success(data.message)
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong')
                }
            });
        }
    </script>
@endsection
