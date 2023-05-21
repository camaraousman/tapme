<h2>{{__('Basic Information')}}</h2>
<p class="mb-4">
    {{__('Edit your basic information')}}
</p>
<form action="#" method="POST" id="basic_info_form" enctype="multipart/form-data">
    @csrf

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-user font-12"></i>
        <input type="name" class="form-control validate-name" id="name" name="name" placeholder="{{__('Enter First Name')}}">
        <label for="name" class="color-blue-dark font-13">{{__('Name')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('required')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-user font-12"></i>
        <input type="name" class="form-control validate-name" id="surname" placeholder="{{__('Enter Last Name')}}" name="surname">
        <label for="surname" class="color-blue-dark font-13">{{__('Surname')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('required')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-user font-12"></i>
        <input type="name" class="form-control validate-name" id="city" placeholder="{{__('Enter city name')}}" name="city">
        <label for="surname" class="color-blue-dark font-13">{{__('City')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('optional')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-user font-12"></i>
        <input type="name" class="form-control validate-name" id="country" placeholder="{{__('Enter your country name')}}" name="country">
        <label for="surname" class="color-blue-dark font-13">{{__('Country')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('optional')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-briefcase font-12"></i>
        <input type="name" class="form-control validate-name" id="title" placeholder="{{__('Example: Software Developer')}}" name="title">
        <label for="title" class="color-blue-dark font-13">{{__('Job Title')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('optional')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-briefcase font-12"></i>
        <input type="name" class="form-control validate-name" id="position" placeholder="{{__('Example: CEO of TapMe')}}" name="position">
        <label for="position" class="color-blue-dark font-13">{{__('Position')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('optional')}})</em>
    </div>

    <div class="input-style input-style-always-active has-borders has-icon validate-field">
        <i class="fa fa-house font-12"></i>
        <input type="name" class="form-control validate-name" id="company" name="company" placeholder="{{__('Company Name')}}">
        <label for="company" class="color-blue-dark font-13">{{__('Company')}}</label>
        <i class="fa fa-times disabled invalid color-red-dark"></i>
        <i class="fa fa-check disabled valid color-green-dark"></i>
        <em>({{__('optional')}})</em>
    </div>

    <button  id="submit_basic_information" type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Update')}}</button>

</form>

@section('basic-info-scripts')
    <script>
        $('#basic_info_form').submit(function (e){
            e.preventDefault();
            const data = {
                name: $('#name').val(),
                surname: $('#surname').val(),
                title: $('#title').val(),
                position: $('#position').val(),
                company: $('#company').val(),
                city: $('#city').val(),
                country: $('#country').val(),
            }
            $.ajax({
                type: "post",
                url: "{{route('profile.basic_info')}}",
                data: data,
                success: function (data) {
                    toastr.success(data.message);
                    fetch_all();
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong!')
                }
            });
        });
    </script>
@endsection
