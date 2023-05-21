<h3>{{__('Language Choice')}}</h3>
<p>
    {{__('Choose a language you would like your page visitors to see by default')}}
</p>

<div class="content">
    <div class="row mb-0">
        <form action="#" id="language_choice_form">
            <div class="fac fac-radio fac-default"><span></span>
                <input id="language_en" type="radio" name="language_choice" value="en">
                <label for="language_en">English</label>
            </div>
            <div class="fac fac-radio fac-blue"><span></span>
                <input id="language_fr" type="radio" name="language_choice" value="fr">
                <label for="language_fr">Français</label>
            </div>
            <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Update')}}</button>
        </form>
    </div>
</div>

@section('language-choice-scripts')
    <script>
        $('#language_choice_form').on('submit', function (e){
            e.preventDefault();
            const data = {
                language: $("input:radio[name ='language_choice']:checked").val(),
            }
            $.ajax({
                type: "post",
                url: "{{route('profile.language_choice')}}",
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
