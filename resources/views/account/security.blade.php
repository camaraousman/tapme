<h2 class="mb-0">{{__('Account Security')}}</h2>
<p>{{__('Change your password')}}</p>
<form action="#" id="security-form">
    <div class="input-style input-style-always-active has-borders no-icon validate-field">
        <input type="password" class="form-control validate-text" id="current_password" placeholder="{{__('Enter Current Password')}}" required>
        <label for="current_password" class="color-blue-dark font-12">{{__('Current Password')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('required')}})</em>
    </div>
    <div class="input-style input-style-always-active has-borders no-icon validate-field">
        <input type="password" class="form-control validate-text" id="password" placeholder="{{__('Enter New Password')}}" required>
        <label for="password" class="color-blue-dark font-12">{{__('New Password')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('required')}})</em>
    </div>
    <div class="input-style input-style-always-active has-borders no-icon validate-field">
        <input type="password" class="form-control validate-text" id="password_confirmation" placeholder="{{__('Enter New Password Again')}}" required>
        <label for="password_confirmation" class="color-blue-dark font-12">{{__('Confirm Password')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('required')}})</em>
    </div>
    <button type="submit" id="save_security" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">
        {{__('Update')}}</button>
</form>

@section('security-scripts')
    <script>
        $('#security-form').on('submit', function (e){
            e.preventDefault();
            var data = {
                'current_password': $('#current_password').val(),
                'password': $('#password').val(),
                'password_confirmation': $('#password_confirmation').val(),
            }


            $.ajax({
                type: "post",
                url: "{{route('profile.update_password')}}",
                data: data,
                success: function (response) {
                    if(response.status == 1){
                        toastr.success(response.message)
                    }
                },
                error: function (response) {
                    if(response.status == 422){
                        if(response.responseJSON.errors.current_password){
                            response.responseJSON.errors.current_password.forEach(function (error){
                                toastr.error(error);
                            });
                        }
                        if(response.responseJSON.errors.password){
                            response.responseJSON.errors.password.forEach(function (error){
                                toastr.error(error);
                            });
                        }
                    }else{
                        toastr.error('something went wrong!');
                    }
                }
            });
        });
    </script>
@endsection
