@extends('layouts.default')

@section('content')
    <!-- Begin Page Content-->
    <div id="toast-3" class="toast toast-tiny toast-top bg-green-dark" data-bs-delay="1000" data-autohide="true"><i class="fa fa-check me-3"></i>Successful</div>
    <div id="toast-4" class="toast toast-tiny toast-top bg-red-dark" data-bs-delay="1000" data-autohide="true"><i class="fa fa-times me-3"></i>Error Occured</div>
    <form method="POST" action="#" id="create-user">
        @csrf
        <div class="content mb-0">
            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="name" class="form-control validate-name" id="name" name="name" placeholder="First Name">
                <label for="name" class="color-blue-dark font-13">Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-user font-12"></i>
                <input type="name" class="form-control validate-name" id="surname" placeholder="Last Name" name="surname">
                <label for="surname" class="color-blue-dark font-13">Surname</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-at"></i>
                <input type="email" class="form-control validate-text" id="email" name="email" placeholder="Email" required autofocus>
                <label for="form2a" class="color-blue-dark">Email</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <div class="input-style input-style-always-active has-borders has-icon validate-field">
                <i class="fa fa-key"></i>
                <input type="password" class="form-control validate-text" id="password" name="password" placeholder="Enter password" value="password">
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>

            <button type="submit" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-900 bg-highlight mb-4">Create</button>
        </div>
    </form>

@endsection

@section('extra_script')
    <script>
        $('#create-user').submit(function (e){
            e.preventDefault();
            const data = {
                name: $('#name').val(),
                surname: $('#surname').val(),
                email: $('#email').val(),
                password: $('#password').val(),
            }
            $.ajax({
                type: "post",
                url: "{{route('register')}}",
                data: data,
                success: function () {
                    successToast();
                },
                error: function (request, status, error) {
                    errorToast();
                }
            });
        })

        function successToast(){
            let toastID = document.getElementById('toast-3');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }
        function errorToast(){
            let toastID = document.getElementById('toast-4');
            toastID = new bootstrap.Toast(toastID);
            toastID.show();
        }
    </script>
@endsection
