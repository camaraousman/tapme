@extends('layouts.default')

@section('content')
    <div class="content" id="tab-group-1">
        <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
            <a href="#" data-active data-bs-toggle="collapse" data-bs-target="#tab-1">{{__('Image 1')}}</a>
            <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-2">{{__('Image 2')}}</a>
            <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-3">{{__('Image 3')}}</a>
            <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-4">{{__('Image 4')}}</a>
        </div>
        <div class="clearfix mb-3"></div>


        <div data-bs-parent="#tab-group-1" class="collapse show" id="tab-1">
            <form id="image-1-form" enctype="multipart/form-data">
                @csrf
                <div class="file-data pb-5">
                    <input type="file" name="image" id="file-upload-1" class="upload-file bg-highlight shadow-s rounded-s file-upload-1" accept="image/*">
                    <p class="upload-file-text color-white">{{__('Change Image')}}</p>
                </div>
                <div class="list-group list-custom-large upload-file-data">
                    <img id="image-data-1" @if($image_1 == null) src="{{asset('assets/catalogues/empty.jpg')}}" @else src="{{asset('assets/catalogues/'.$image_1)}}"  @endif  class="img-fluid">
                    <a href="#" class="border-0 file-info file-info-1 disabled">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>{{__('Image Name')}}</span>
                        <strong class="upload-file-name upload-file-name-1"></strong>
                    </a>
                    <a href="#" class="border-0 file-info file-info-1 disabled">
                        <i class="fa font-14 fa-weight-hanging color-brown-dark"></i>
                        <span>{{__('Image Size')}}</span>
                        <strong class="upload-file-size upload-file-size-1"></strong>
                    </a>

                    <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Save Image')}}</button>
                </div>
            </form>
{{--            @if($image_1 != null)--}}
{{--                <div class="content">--}}
{{--                    <button onclick="delete_image_media(this.id)" id="1" class="btn btn-full bg-red-dark btn-m text-uppercase rounded-sm shadow-l mt-1 font-900">{{__('Delete Image')}}</button>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>


        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-2">
            <form id="image-2-form" enctype="multipart/form-data">
                @csrf
                <div class="file-data pb-5">
                    <input type="file" name="image" id="file-upload-2" class="upload-file bg-highlight shadow-s rounded-s file-upload-2" accept="image/*">
                    <p class="upload-file-text color-white">{{__('Change Image')}}</p>
                </div>
                <div class="list-group list-custom-large upload-file-data">
                    <img id="image-data-2" @if($image_2 == null) src="{{asset('assets/catalogues/empty.jpg')}}" @else src="{{asset('assets/catalogues/'.$image_2)}}"  @endif class="img-fluid">
                    <a href="#" class="border-0 file-info file-info-2 disabled">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>{{__('Image Name')}}</span>
                        <strong class="upload-file-name upload-file-name-2"></strong>
                    </a>
                    <a href="#" class="border-0 file-info file-info-2 disabled">
                        <i class="fa font-14 fa-weight-hanging color-brown-dark"></i>
                        <span>{{__('Image Size')}}</span>
                        <strong class="upload-file-size upload-file-size-2"></strong>
                    </a>

                    <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Save Image')}}</button>
                </div>
            </form>
{{--            @if($image_2 != null)--}}
{{--                <div class="content">--}}
{{--                    <button onclick="delete_image_media(this.id)" id="2" class="btn btn-full bg-red-dark btn-m text-uppercase rounded-sm shadow-l mt-1 font-900">{{__('Delete Image')}}</button>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>


        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-3">
            <form id="image-3-form" enctype="multipart/form-data">
                @csrf
                <div class="file-data pb-5">
                    <input type="file" name="image" id="file-upload-3" class="upload-file bg-highlight shadow-s rounded-s file-upload-3" accept="image/*">
                    <p class="upload-file-text color-white">{{__('Change Image')}}</p>
                </div>
                <div class="list-group list-custom-large upload-file-data">
                    <img id="image-data-3" @if($image_3 == null) src="{{asset('assets/catalogues/empty.jpg')}}" @else src="{{asset('assets/catalogues/'.$image_3)}}"  @endif class="img-fluid">
                    <a href="#" class="border-0 file-info file-info-3 disabled">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>{{__('Image Name')}}</span>
                        <strong class="upload-file-name upload-file-name-3"></strong>
                    </a>
                    <a href="#" class="border-0 file-info file-info-3 disabled">
                        <i class="fa font-14 fa-weight-hanging color-brown-dark"></i>
                        <span>{{__('Image Size')}}</span>
                        <strong class="upload-file-size upload-file-size-3"></strong>
                    </a>

                    <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Save Image')}}</button>
                </div>
            </form>
{{--            @if($image_3 != null)--}}
{{--                <div class="content">--}}
{{--                    <button onclick="delete_image_media(this.id)" id="3" class="btn btn-full bg-red-dark btn-m text-uppercase rounded-sm shadow-l mt-1 font-900">{{__('Delete Image')}}</button>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>

        <div data-bs-parent="#tab-group-1" class="collapse" id="tab-4">
            <form id="image-4-form" enctype="multipart/form-data">
                @csrf
                <div class="file-data pb-5">
                    <input type="file" name="image" id="file-upload-4" class="upload-file bg-highlight shadow-s rounded-s file-upload-4" accept="image/*">
                    <p class="upload-file-text color-white">{{__('Change Image')}}</p>
                </div>
                <div class="list-group list-custom-large upload-file-data">
                    <img id="image-data-4" @if($image_4 == null) src="{{asset('assets/catalogues/empty.jpg')}}" @else src="{{asset('assets/catalogues/'.$image_4)}}"  @endif class="img-fluid">
                    <a href="#" class="border-0 file-info file-info-4 disabled">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>{{__('Image Name')}}</span>
                        <strong class="upload-file-name upload-file-name-4"></strong>
                    </a>
                    <a href="#" class="border-0 file-info file-info-4 disabled">
                        <i class="fa font-14 fa-weight-hanging color-brown-dark"></i>
                        <span>{{__('Image Size')}}</span>
                        <strong class="upload-file-size upload-file-size-4"></strong>
                    </a>

                    <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Save Image')}}</button>
                </div>
            </form>
{{--            @if($image_4 != null)--}}
{{--                <div class="content">--}}
{{--                    <button type="button" onclick="delete_image_media(this.id)" id="4" class="btn btn-full bg-red-dark btn-m text-uppercase rounded-sm shadow-l mt-1 font-900">{{__('Delete Image')}}</button>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>
@endsection

@section('extra_script')
    <script>
        var empty_image_src = "{{asset('assets/catalogues/empty.jpg')}}";
        $('#image-1-form').on('submit', function (e){
            e.preventDefault();
            let form = new FormData(this);
            form.append('column', 'image_1')
            store_image(form)
        })

        $('#image-2-form').on('submit', function (e){
            e.preventDefault();
            let form = new FormData(this);
            form.append('column', 'image_2')
            store_image(form)
        })
        $('#image-3-form').on('submit', function (e){
            e.preventDefault();
            let form = new FormData(this);
            form.append('column', 'image_3')
            store_image(form)
        })
        $('#image-4-form').on('submit', function (e){
            e.preventDefault();
            let form = new FormData(this);
            form.append('column', 'image_4')
            store_image(form)
        })

        function store_image(form){
            $.ajax({
                type: "post",
                url: "{{route('upload_media_image')}}",
                data: form,
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr.success(data.message);
                },
                error: function (request, status, error) {
                    toastr.error('something went wrong!')
                }
            });
        }

        {{--function delete_image_media(id){--}}
        {{--    $.ajax({--}}
        {{--        type: "post",--}}
        {{--        url: "{{route('delete_media_image')}}",--}}
        {{--        data: {'id': id},--}}
        {{--        success: function (data) {--}}
        {{--            if(data.status == 1){--}}
        {{--                $('#'.id).attr('src', empty_image_src)--}}
        {{--                toastr.success(data.message);--}}
        {{--            }--}}
        {{--            if(data.status == 0) {--}}
        {{--                toastr.error(data.message)--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (request, status, error) {--}}
        {{--            toastr.error('something went wrong!')--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}


        //File Upload
        const inputArray1 = document.getElementsByClassName('file-upload-1');
        const inputArray2 = document.getElementsByClassName('file-upload-2');
        const inputArray3 = document.getElementsByClassName('file-upload-3');
        const inputArray4 = document.getElementsByClassName('file-upload-4');

        if(inputArray1.length || inputArray2.length || inputArray3.length || inputArray4.length){
            inputArray1[0].addEventListener('change', (evt) => prepareUpload('image-data-1', 'file-info-1', 'upload-file-name-1', 'upload-file-size-1'),false);
            inputArray2[0].addEventListener('change', (evt) => prepareUpload('image-data-2', 'file-info-2', 'upload-file-name-2', 'upload-file-size-2'),false);
            inputArray3[0].addEventListener('change', (evt) => prepareUpload('image-data-3', 'file-info-3', 'upload-file-name-3', 'upload-file-size-3'),false);
            inputArray4[0].addEventListener('change', (evt) => prepareUpload('image-data-4', 'file-info-4', 'upload-file-name-4', 'upload-file-size-4'),false);
            function prepareUpload(image, file_info, file_name, file_size){
                const files = event.target.files;
                const fileName = files[0].name;

                console.log(files)
                console.log(fileName)

                if (files && files[0]) {
                    var img = document.getElementById(image);
                    img.src = URL.createObjectURL(event.target.files[0]);
                }

                // document.getElementsByClassName('upload-file-text')[0].innerHTML = 'Change Image';
                document.getElementsByClassName(file_info)[0].classList.remove('disabled');
                document.getElementsByClassName(file_info)[1].classList.remove('disabled');
                document.getElementsByClassName(file_name)[0].innerHTML = files[0].name;
                document.getElementsByClassName(file_size)[0].innerHTML = files[0].size/1000+'kb';
            }
        }

    </script>
@endsection
