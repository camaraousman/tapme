<div class="content">
    <h2 class="vcard-title color-highlight mb-1">{{ __('Website') }}</h2>
    <p class="mb-3">
        {{ __('add your websites here..') }}
    </p>

    <!--    Begin Social for adding-->
    <div id="add_office_div">
        <div class="d-flex no-effect"
             data-trigger-switch="toggle-add-website"
             data-bs-toggle="collapse"
             href="#website_add"
             role="button"
             aria-expanded="false"
             aria-controls="website_add">
            <div class="pt-1 align-self-center">
                <div>
                    <span class="default-link d-block color-theme font-15 font-400" id="offices_text"></span>
                </div>
            </div>
            <div class="ms-auto me-3 pe-2 align-self-center">
                <div class="custom-control ios-switch small-switch">
                    <input type="checkbox" class="ios-input" id="toggle-add-website">
                    <label class="custom-control-label" for="toggle-add-website"></label>
                </div>
            </div>
        </div>
        <div class="collapse" id="website_add">
            <div class="input-style input-style-always-active">
                <div class="divider my-3"></div>
                <table id="faqs_website" class="table text-center rounded-sm shadow-l" style="overflow: hidden;">
                    <thead>
                    <tr>
                        <th scope="col" class="bg-night-light border-dark-dark py-3 color-white">{{ __('URL') }}</th>
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
                            <div class="input-style input-style-always-active">
                                <input id="website_url" type="text" class="form-control" placeholder="{{ __('Action') }}">
                                <em>(required)</em>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="#" onclick="addwebsite();" class="btn btn-m btn-full rounded-xl text-uppercase font-900 border-blue-dark color-blue-dark bg-theme">{{ __('Add to table') }}</a>
                </div>

            </div>
        </div>
    </div>
</div>
@section('website_scripts')
    <script>
        var faqs_website_row = 0;
        var table_website_arr = [];

        $("#toggle-add-website").change(function(){
            if(!$(this).prop("checked")){
                store_website()
            }
        });

        function store_website(){
            $.ajax({
                type: "post",
                url: "{{route('websites.store')}}",
                data: {
                    table_arr: table_website_arr,
                },
                success: function (data) {
                    if(data.status == 1){
                        table_website_arr.length = 0;
                        $('#faqs_website').find("tr:gt(0)").remove();
                        fetch_websites();
                        toastr.success(data.message)
                    }else if(data.status == 0){
                        toastr.success('something went wrong')
                    }
                },
                error: function (request, status, error) {
                    toastr.success('something went wrong')
                }
            });
        }

        function fetch_websites(){
            $.ajax({
                type: "get",
                url: "{{route('websites.index')}}",
                success: function (data) {
                    data.forEach(function(item){
                        table_website_arr.push({id: item.id,value: item.url});
                        show_website_edit(item.id, item.url);
                        faqs_website_row = ++item.id;
                    });
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
        }

        function show_website_edit(web_count, value){
            html = '<tr class="bg-dark-light" id="faqs-row-website' + web_count + '">';
            html += '<th scope="row">'+value+'</th>';
            html += '<td><button id="'+web_count+'" onclick="delete_website_row(this.id);"><i class="fa fa-trash"></i></button></td>';
            html += '</tr>';

            $('#faqs_website tbody').append(html);
        }

        function addwebsite() {
            if($('#website_url').val() === ''){
                alert('paste a valid link')
                return;
            }

            html = '<tr class="bg-dark-light" id="faqs-row-website' + faqs_website_row + '">';
            html += '<th>'+$("#website_url").val()+'</th>';
            html += '<td><button id="'+faqs_website_row+'" onclick="delete_website_row(this.id);"><i class="fa fa-trash"></i></button></td>';

            html += '</tr>';

            $('#faqs_website tbody').append(html);

            add_website_to_table();
            clear_website_inputs();
            faqs_website_row++;
        }

        function add_website_to_table(){
            table_website_arr.push({id: faqs_website_row, value: $('#website_url').val()});
        }

        function delete_website_row(row_id) {
            console.log(row_id)
            $('#faqs-row-website' + row_id).remove()
            table_website_arr = table_website_arr.filter(arr => arr.id != row_id)
        }

        function clear_website_inputs(){
            $('#website_url').val('');
        }
    </script>
@endsection
