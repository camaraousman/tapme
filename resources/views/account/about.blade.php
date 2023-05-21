<div class="content">
    <h2 class="vcard-title color-highlight mb-1">{{ __('About Me') }}</h2>
    <p class="mb-3">
        {{ __('A small introduction about yourself') }}
    </p>

    <form action="#" id="about-form">
        <!--    Begin Office for adding-->
        <div class="input-style input-style-always-active has-borders validate-field">
            <textarea placeholder="{{__('Enter an introduction of yourself in English')}}" id="english_text" maxlength="150" required></textarea>
            <label for="surname" class="color-blue-dark font-13">{{__('English Text')}}</label>
            <em class="mt-n3">({{__('optional')}})</em>
        </div>

        <div id="add_office_div">
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
                    <textarea placeholder="{{__('Enter an introduction of yourself in French')}}" id="french_text" maxlength="150"></textarea>
                    <label for="surname" class="color-blue-dark font-13">{{__('French Text')}}</label>
                    <em class="mt-n3">({{__('optional')}})</em>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Store')}}</button>
    </form>
</div>
@section('about_scripts')
    <script>

        $('#about-form').on('submit', function (e){
           e.preventDefault();
           store_about();
        });

        function store_about(about){
            $.ajax({
                type: "post",
                url: "{{route('abouts.store')}}",
                data: {
                    english_text: $('#english_text').val(),
                    french_text: $('#french_text').val(),
                },
                success: function (data) {
                    if(data.status == 1){
                        fetch_abouts();
                        toastr.success(data.message)
                    }else if(data.status == 0){
                        toastr.error('something went wrong')
                    }
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong')
                }
            });
        }

        function fetch_abouts(){
            $.ajax({
                type: "get",
                url: "{{route('abouts.index')}}",
                success: function (data) {
                    $('#english_text').val(data.english_text)
                    $('#french_text').val(data.french_text)
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    </script>
@endsection
