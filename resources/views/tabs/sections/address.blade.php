<div class="content">
    <h2 class="vcard-title color-highlight mb-1">{{ __('Address') }}</h2>
    <p class="mb-3">
        {{ __('Manage Addresses') }}
    </p>
    <!--    Begin Office for adding-->
    <div id="add_office_div">
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-address"
             data-bs-toggle="collapse"
             href="#office_add"
             role="button"
             aria-expanded="false"
             aria-controls="office_add">
            <div class="pt-1 align-self-center">
                <div>
                    <div>
                        <span class="default-link d-block color-theme font-15 font-400" id="address_text"></span>
                    </div>
                </div>
            </div>

            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-address">
                    <label class="custom-control-label" for="toggle-add-address"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="office_add">
            <div class="divider my-3"></div>
            <div class="input-style has-borders no-icon mb-4">
                <textarea placeholder="Enter Address text here..." id="address_input" maxlength="200"></textarea>
                <em class="mt-n3">(required)</em>
            </div>

            <div class="d-flex no-effect"
                 data-trigger-switch="toggle-add-address-map"
                 data-bs-toggle="collapse"
                 href="#office_add_map"
                 role="button"
                 aria-expanded="false"
                 aria-controls="office_add_map">
                <div class="form-check icon-check">
                    <input class="form-check-input" type="checkbox" value="" id="toggle-add-address-map">
                    <label class="form-check-label" for="check1">{{ __('Add map location') }}</label>
                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                    <i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
                </div>
            </div>

            <div class="collapse" id="office_add_map">
                <div class="ms-auto">
                    <i class="fa fa-map-marker color-theme opacity-30"></i>
                </div>
                <div class="input-style input-style-always-active">
                    <input id="address-map-input" type="tel" class="form-control" placeholder="{{ __('Paste Google Map Link here..') }}" maxlength="250">
                </div>
            </div>
        </div>
    </div>

</div>

@section('address_scripts')
    <script>
        $("#toggle-add-address").change(function(){
            if(!$(this).prop("checked")){
                store_address($('#address_input').val(), map_url = $('#address-map-input').val())
            }
        });

        function store_address(address, map_url){
            if (!$('#toggle-add-address-map').is(":checked"))
            {
                map_url = null;
            }

            $.ajax({
                type: "post",
                url: "{{route('addresses.store')}}",
                data: {
                    address: address,
                    map_url: map_url
                },
                success: function (data) {
                    if(data.status == 1){
                        fetch_address();
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

        function fetch_address(){
            $.ajax({
                type: "get",
                url: "{{route('addresses.index')}}",
                success: function (data) {
                    $('#address_text').text(data.address_text)
                    $('#address_input').val(data.address_text)
                    $('#address-map-input').val(data.address_url)
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }
    </script>
@endsection
