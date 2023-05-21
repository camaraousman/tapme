<div class="content">
    <h2 class="vcard-title color-highlight mb-1">{{ __('Email') }}</h2>
    <p class="mb-3">
        {{ __('Manage Emails') }}
    </p>
    <div>
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-office-email"
             data-bs-toggle="collapse"
             href="#office_email_add"
             role="button"
             aria-expanded="false"
             aria-controls="office_email_add">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{ __('Office') }}</span>
                    <span class="default-link d-block color-theme font-15 font-400" id="office_email_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-office-email">
                    <label class="custom-control-label" for="toggle-add-office-email"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="office_email_add">
            <div class="input-style input-style-always-active has-icon">
                <i class="fa fa-suitcase color-theme opacity-30"></i>
                <input type="email" class="form-control" placeholder="test@email.com" id="office_email_input" maxlength="35">
            </div>
        </div>
    </div>

    <!--  Begin Personal    -->
    <div>
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-personal-email"
             data-bs-toggle="collapse"
             href="#personal_add_email"
             role="button"
             aria-expanded="false"
             aria-controls="personal_add_email">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{ __('Personal') }}</span>
                    <span class="default-link d-block color-theme font-15 font-400" id="personal_email_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-personal-email" maxlength="35">
                    <label class="custom-control-label" for="toggle-add-personal-email"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="personal_add_email">
            <div class="input-style input-style-always-active has-icon">
                <i class="fa fa-phone font-12"></i>
                <input type="email" class="form-control" placeholder="test@gmail.com" id="personal_email_input">
            </div>
        </div>
    </div>
</div>


@section('email_scripts')
    <script>
        $("#toggle-add-office-email").change(function(){
            if(!$(this).prop("checked")){
                store_email($('#office_email_input').val(), 0)
            }
        });

        $("#toggle-add-personal-email").change(function(){
            if(!$(this).prop("checked")){
                store_email($('#personal_email_input').val(), 1)
            }
        });

        function store_email(email, type){
            console.log("email ="+ email)
            console.log("type ="+ type)
            $.ajax({
                type: "post",
                url: "{{route('emails.store')}}",
                data: {
                    email: email,
                    type: type
                },
                success: function (data) {
                    if(data.status == 1){
                        fetch_emails();
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

        function fetch_emails(){
            $.ajax({
                type: "get",
                url: "{{route('emails.index')}}",
                success: function (data) {
                    $('#personal_email_text').text(data.personal_email)
                    $('#personal_email_input').val(data.personal_email)
                    $('#office_email_text').text(data.office_email)
                    $('#office_email_input').val(data.office_email)
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    </script>
@endsection
