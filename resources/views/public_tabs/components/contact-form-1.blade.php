<div id="instant-3"
     class="menu menu-box-top"
     data-menu-width="cover"
     data-menu-height="cover"
     data-menu-effect="menu-over">

    <div class="contact-form">
        <a href="#" class="close-menu notch-clear  btn btn-full btn-m rounded-s font-900 color-white bg-red-dark  p-1" id="close-contact-form">{{__('Close')}}</a>
        <div class="content">
            <form action="#" class="contactForm" id="contactForm">
                <fieldset>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="form_name">{{__('Name')}}:<span>({{__('required')}})</span></label>
                        <input maxlength="35" type="text" name="form_name" value="" class="round-small" id="form_name" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="form_phone">{{__('Phone')}}:<span>({{__('required')}})</span></label>
                        <input maxlength="35" type="text" name="form_phone" value="" class="round-small" id="form_phone" />
                    </div>
                    <div class="form-field form-email">
                        <label class="contactEmailField color-theme" for="form_email">{{__('Email')}}:<span>({{__('required')}})</span></label>
                        <input maxlength="40" type="text" name="form_email" value="" class="round-small" id="form_email" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="form_position">{{__('Position')}}:<span>({{__('required')}})</span></label>
                        <input maxlength="40" type="text" name="form_position" value="" class="round-small" id="form_position" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="form_company">{{__('Company')}}:<span>({{__('required')}})</span></label>
                        <input maxlength="40" type="text" name="form_company" value="" class="round-small" id="form_company" />
                    </div>
                </fieldset>
            </form>
            <div class="d-flex justify-content-center hide-pending" id="pending">
                <div class="spinner-border color-red-dark" style="border-width: 1px;" role="status">

                </div>
            </div>
            <div class="form-button">
                <input type="button" class="btn btn-full btn-m rounded-s font-900 color-white bg-black  p-1" id="submit_contact" value="{{__('Submit')}}" data-formId="contactForm" />
            </div>
        </div>
    </div>
</div>





@section('contact-scripts')
    <script>
        $('#submit_contact').on('click',function (e){
            $('#pending').removeClass('hide-pending')
            if(!validate_form()){
                $('#pending').addClass('hide-pending')
                return;
            }

            var form_data = {
                'name': $('#form_name').val(),
                'phone': $('#form_phone').val(),
                'email': $('#form_email').val(),
                'position': $('#form_position').val(),
                'company': $('#form_company').val(),
                'user_id': user_id
            }

            $.ajax({
                type: "post",
                url: "{{route('send-email')}}",
                data: form_data,
                success: function (data) {
                    $('#pending').addClass('hide-pending')
                    if(data.status != 1){
                        toastr.error('Something went wrong');
                        return;
                    }
                    toastr.success(data.message)
                    close_contact_modal();
                },
                error: function () {
                    $('#pending').addClass('hide-pending')
                    toastr.error('Something went wrong');
                }
            });

            function validate_form(){
                var nameField = document.getElementById('form_name');
                var mailField = document.getElementById('form_email');
                var phoneField = document.getElementById('form_phone');
                var positionField = document.getElementById('form_position');
                var companyField = document.getElementById('form_company');
                var validateMail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(nameField.value === ''){
                    toastr.error('name field cannot be empty');
                    return false;
                }
                if(phoneField.value === ''){
                    toastr.error('phone field cannot be empty');
                    return false;
                }

                if(mailField.value === ''){
                    toastr.error('email field cannot be empty');
                } else {
                    if(!validateMail.test(mailField.value)){
                        toastr.error('invalid email address');
                    }
                }

                if(positionField.value === ''){
                    toastr.error('position field cannot be empty');
                    return false;
                }
                if(companyField.value === ''){
                    toastr.error('company field cannot be empty');
                    return false;
                }

                return true;
            }
        });

        function close_contact_modal(){
            const activeMenu = document.querySelectorAll('.menu-active');
            for(let i=0; i < activeMenu.length; i++){activeMenu[i].classList.remove('menu-active');}
            var iframes = document.querySelectorAll('iframe');
            iframes.forEach(el => {var hrefer = el.getAttribute('src'); el.setAttribute('newSrc', hrefer); el.setAttribute('src',''); var newSrc = el.getAttribute('newSrc');el.setAttribute('src', newSrc)});
        }

    </script>
@endsection
