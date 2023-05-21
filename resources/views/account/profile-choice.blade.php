<h3>{{__('Profile Choice')}}</h3>
<p>
    {{__('Choose a profile you would like your page visitors to see.')}}
</p>

<div class="content">
    <div class="row mb-0">
        <form action="#" id="profile_choice_form">
            <div class="fac fac-radio fac-default"><span></span>
                <input id="profile_1" type="radio" name="profile" value="1">
                <label for="profile_1">{{config('app.name')}} {{__('White Profile')}}</label>
            </div>
            <div class="fac fac-radio fac-blue"><span></span>
                <input id="profile_2" type="radio" name="profile" value="2">
                <label for="profile_2">{{config('app.name')}} {{__('Black Profile')}}</label>
            </div>
{{--            <div class="fac fac-radio fac-green"><span></span>--}}
{{--                <input id="profile_3" type="radio" name="profile" value="3">--}}
{{--                <label for="profile_3">{{config('app.name')}} {{__('classic profile')}}</label>--}}
{{--            </div>--}}
            <button  id="submit_profile_choice" type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Update')}}</button>
        </form>
    </div>
</div>

@section('profile-choice-scripts')
    <script>
        $('#profile_choice_form').submit(function (e){
            e.preventDefault();
            const data = {
                profile: $("input:radio[name ='profile']:checked").val(),
            }
            $.ajax({
                type: "post",
                url: "{{route('profile.profile_choice')}}",
                data: data,
                success: function (data) {
                    toastr.success(data.message)
                    fetch_all();
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong!')
                }
            });
        });
    </script>
@endsection
