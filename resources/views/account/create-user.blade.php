@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <form method="POST" action="#" id="create-user">
        @csrf
        <div class="content mb-0">
            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="name" class="form-control validate-name" id="name" name="name" placeholder="{{__('Enter First Name')}}" required autofocus>
                <label for="name" class="color-blue-dark font-13">{{__('Name')}}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>({{__('required')}})</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="name" class="form-control validate-name" id="surname" placeholder="{{__('Enter Last Name')}}" name="surname" required autofocus>
                <label for="surname" class="color-blue-dark font-13">{{__('Surname')}}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>({{__('required')}})</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="name" class="form-control validate-name" id="username" placeholder="{{__('Give a unique username')}}" name="username" required autofocus>
                <label for="username" class="color-blue-dark font-13">{{__('Username')}}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>({{__('required')}})</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-at"></i>
                <input type="email" class="form-control validate-text" id="email" name="email" placeholder="{{__('Enter user email address')}}" required autofocus>
                <label for="form2a" class="color-blue-dark">{{__('Email')}}</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>({{__('required')}})</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-key"></i>
                <input type="password" class="form-control validate-text" id="password" name="password" placeholder="{{__('Enter password')}}" value="password" required autofocus>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>({{__('required')}})</em>
            </div>
            <div class="d-flex justify-content-center hide-pending" id="pending">
                <div class="spinner-border color-red-dark" style="border-width: 1px;" role="status">

                </div>
            </div>
            <button type="submit" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-900 bg-highlight mb-4">{{__('Create')}}</button>

        </div>
    </form>
@endsection

@section('extra_script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $('#create-user').submit(function (e){
            e.preventDefault();

            $('#pending').removeClass('hide-pending')

            const data = {
                name: $('#name').val(),
                surname: $('#surname').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
            }
            $.ajax({
                type: "post",
                url: "{{route('users.store')}}",
                data: data,
                success: function (response) {
                    $('#pending').addClass('hide-pending')
                    toastr.success(response.message)
                },
                error: function (response) {
                    $('#pending').addClass('hide-pending')
                    if(response.status == 422){
                        if(response.responseJSON.errors.email){
                            response.responseJSON.errors.email.forEach(function (error){
                                toastr.error(error);
                            });
                        }
                        if(response.responseJSON.errors.password){
                            response.responseJSON.errors.password.forEach(function (error){
                                toastr.error(error);
                            });
                        }
                        if(response.responseJSON.errors.username){
                            response.responseJSON.errors.username.forEach(function (error){
                                toastr.error(error);
                            });
                        }
                    }else{
                        toastr.error('something went wrong!');
                    }
                }
            });
        })
    </script>
@endsection
