<div class="content">
    <div id="toast-phone-success" class="toast toast-tiny toast-top bg-green-dark" data-bs-delay="1000" data-autohide="true"><i class="fa fa-check me-3"></i>{{ __('Successful') }}</div>
    <div id="toast-phone-error" class="toast toast-tiny toast-top bg-red-dark" data-bs-delay="1000" data-autohide="true"><i class="fa fa-times me-3"></i>{{ __('Error') }}</div>
    <h2 class="vcard-title color-highlight mb-1">{{ __('Phone') }}</h2>
    <p class="mb-3">
        {{ __('Manage phone numbers') }}
    </p>

    <!--    Begin Office for adding-->
    <div id="add_office_div">
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-office"
             data-bs-toggle="collapse"
             href="#office_add"
             role="button"
             aria-expanded="false"
             aria-controls="office_add">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{ __('Office') }}</span>
                    <span class="default-link d-block color-theme font-15 font-400" id="office_number_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-office">
                    <label class="custom-control-label" for="toggle-add-office"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="office_add">
            <div class="input-style input-style-always-active has-icon">
                <i class="fa fa-suitcase color-theme opacity-30"></i>
                <input id="office_number_input" type="tel" class="form-control" placeholder="+212 537 037 4682" maxlength="35">
                <em class="mt-n3">({{__('required')}})</em>
            </div>
        </div>
    </div>
    <!--  Begin Add Mobile    -->
    <div id="add_mobile_div">
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-mobile"
             data-bs-toggle="collapse"
             href="#mobile_add"
             role="button"
             aria-expanded="false"
             aria-controls="mobile_add">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{ __('Mobile') }}</span>
                    <span class="default-link d-block color-theme font-15 font-400" id="mobile_number_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-mobile">
                    <label class="custom-control-label" for="toggle-add-mobile"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="mobile_add">
            <div class="input-style input-style-always-active has-icon">
                <i class="fa fa-phone font-12"></i>
                <input id="mobile_number_input" class="form-control" type="tel" placeholder="+90 537 037 4682" maxlength="35">
                <em class="mt-n3">({{__('required')}})</em>
            </div>
        </div>
    </div>
</div>

@section('phone_scripts')
    <script>
        $("#toggle-add-office").change(function(){
            if(!$(this).prop("checked")){
                store_phone($('#office_number_input').val(), 0)
            }
        });

        $("#toggle-add-mobile").change(function(){
            if(!$(this).prop("checked")){
                store_phone($('#mobile_number_input').val(), 1)
            }
        });

        function store_phone(number, type){
            $.ajax({
                type: "post",
                url: "{{route('phones.store')}}",
                data: {
                    number: number,
                    type: type
                },
                success: function (data) {
                    if(data.status == 1){
                        fetch_phones();
                        toastr.success(data.message)
                    }else if(data.status == 0){
                        toastr.error('something went wrong')
                    }
                },
                error: function () {
                    toastr.error('something went wrong')
                }
            });
        }

        function fetch_phones(){
            $.ajax({
                type: "get",
                url: "{{route('phones.index')}}",
                success: function (data) {
                    $('#mobile_number_text').text(data.mobile_number)
                    $('#mobile_number_input').val(data.mobile_number)
                    $('#office_number_text').text(data.office_number)
                    $('#office_number_input').val(data.office_number)
                },
                error: function (request, status, error) {
                }
            });
        }

        function successToastPhone(){
            let toastID = document.getElementById('toast-phone-success');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }
        function errorToastPhone(){
            let toastID = document.getElementById('toast-phone-error');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }
    </script>
@endsection


