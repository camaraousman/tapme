<div class="content">
    <h2 class="vcard-title color-highlight mb-1">{{ __('Socials') }}</h2>
    <p class="mb-3">
        {{ __('Manage social media') }}
    </p>

    <!--    Begin Social for adding-->
    <div id="add_office_div">
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-social"
             data-bs-toggle="collapse"
             href="#social_add"
             role="button"
             aria-expanded="false"
             aria-controls="social_add">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="font-11 d-block mb-n2 opacity-50 color-theme">{{ __('Socials') }}</span>
                    <span class="default-link d-block color-theme font-15 font-400" id="offices_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-social">
                    <label class="custom-control-label" for="toggle-add-social"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="social_add">
            <div class="input-style input-style-always-active">

                <div class="divider my-3"></div>
                <table id="faqs" class="table text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                    <tr>
                        <th scope="col" class="bg-night-light border-dark-dark py-3 color-white">{{ __('App') }}</th>
                        <th scope="col" class="bg-night-light border-dark-dark py-3 color-white">{{ __('Username') }}</th>
                        <th scope="col" class="bg-night-light border-dark-dark py-3 color-white">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table id="faqs_first" class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <tbody>
                    <tr>
                        <td>
                            <div class="input-style no-borders no-icon mb-4">
                                <label for="form5a" class="color-highlight">{{ __('Choose') }}</label>
                                <select id="social_app" >
                                    <option value="0" selected>{{ __('Choose') }}</option>
                                    <option value="facebook">facebook</option>
                                    <option value="instagram">instagram</option>
                                    <option value="twitter">twitter</option>
                                    <option value="linkedin">linkedIn</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-style input-style-always-active">
                                <input id="social_app_username" type="text" class="form-control" placeholder="{{ __('enter your username') }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-style input-style-always-active">
                                <input id="social_app_url" type="text" class="form-control" placeholder="{{ __('paste link here..') }}">
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="#" onclick="addsocial();" class="btn btn-m btn-full rounded-xl text-uppercase font-900 border-blue-dark color-blue-dark bg-theme">{{ __('Add to table') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@section('social_scripts')
    <script>
        var faqs_row = 0;
        var table_arr = [];

        $("#toggle-add-social").change(function(){
            if(!$(this).prop("checked")){
                store_social()
            }
        });

        function store_social(){
            $.ajax({
                type: "post",
                url: "{{route('socials.store')}}",
                data: {
                    table_arr: table_arr,
                },
                success: function (data) {
                    if(data.status == 1){
                        table_arr.length = 0;
                        $('#faqs').find("tr:gt(0)").remove();
                        fetch_socials();
                        toastr.success(data.message);
                    }else if(data.status == 0){
                        toastr.error('something went wrong')
                    }
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong')
                }
            });
        }

        function fetch_socials(){
            $.ajax({
                type: "get",
                url: "{{route('socials.index')}}",
                success: function (data) {
                    if(data.status != 1){
                        return
                    }

                    let count = 0;
                    data.data.forEach(function(item){
                        table_arr.push({id: count,key: item.key, username: item.username, value: item.value});
                        show_edit(count, item.key, item.value, item.username);
                        count++;
                    });

                    console.log(table_arr)
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }

        function show_edit(count, key, value, username){
            html = '<tr class="bg-dark-light" id="faqs-row' + count + '">';
            html += '<th scope="row">'+key+'</th>';
            html += '<th>'+username+'</th>';
            html += '<td><button id="'+count+'" onclick="delete_row(this.id);"><i class="fa fa-trash"></i></button></td>';

            html += '</tr>';

            $('#faqs tbody').append(html);
        }

        function addsocial() {
            if($('#social_app').val() === 0 || $('#social_app_url').val() === ''){
                alert('Choose an app and paste a valid link')
                return;
            }

            html = '<tr class="bg-dark-light" id="faqs-row' + faqs_row + '">';
            html += '<th scope="row">'+$("#social_app").val()+'</th>';
            html += '<th>'+$("#social_app_username").val()+'</th>';
            html += '<td><button id="'+faqs_row+'" onclick="delete_row(this.id);"><i class="fa fa-trash"></i></button></td>';

            html += '</tr>';

            $('#faqs tbody').append(html);

            add_to_table();
            clear_inputs();
            faqs_row++;
        }

        function add_to_table(){
            table_arr.push({id: faqs_row, key: $('#social_app').val(), username: $('#social_app_username').val(), value: $('#social_app_url').val()});
        }

        function delete_row(row_id) {
            console.log(row_id)
            $('#faqs-row' + row_id).remove()
            table_arr = table_arr.filter(arr => arr.id != row_id)
        }

        function clear_inputs(){
            $('#social_app').val('').trigger('change');
            $('#social_app_username').val('');
            $('#social_app_url').val('');
        }
    </script>
@endsection
