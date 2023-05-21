<form action="#" enctype="multipart/form-data" id="upload-image-form">
    @csrf
    <div class="file-data pb-5">
        <input type="file" name="image" id="file-upload" class="upload-file bg-highlight shadow-s rounded-s " accept="image/*">
        <p class="upload-file-text color-white">{{__('Change Image')}}</p>
    </div>
    <div class="list-group list-custom-large upload-file-data">
        <img id="image-data" src="{{asset('assets/profiles/'.$image)}}" class="img-fluid">
        <a href="#" class="border-0 file-info disabled">
            <i class="fa font-14 fa-info-circle color-blue-dark"></i>
            <span>File Name</span>
            <strong class="upload-file-name"></strong>
        </a>
        <a href="#" class="border-0 file-info disabled">
            <i class="fa font-14 fa-weight-hanging color-brown-dark"></i>
            <span>File Size</span>
            <strong class="upload-file-size"></strong>
        </a>

        <button type="submit" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">{{__('Save Image')}}</button>
    </div>
</form>

@section('upload-scripts')
<script>
    $('#upload-image-form').on('submit', function(e){
        e.preventDefault();
        let form = new FormData(this);
        store_image(form)
    });

    function store_image(form){
        $.ajax({
            type: "post",
            url: "{{route('profile.upload')}}",
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

    //File Upload
    const inputArray = document.getElementsByClassName('upload-file');
    if(inputArray.length){
        inputArray[0].addEventListener('change',prepareUpload,false);
        function prepareUpload(event){
            if (this.files && this.files[0]) {
                var img = document.getElementById('image-data');
                img.src = URL.createObjectURL(this.files[0]);
            }
            const files = event.target.files;
            const fileName = files[0].name;
            // document.getElementsByClassName('upload-file-text')[0].innerHTML = 'Change Image';
            document.getElementsByClassName('file-info')[0].classList.remove('disabled');
            document.getElementsByClassName('file-info')[1].classList.remove('disabled');
            document.getElementsByClassName('upload-file-name')[0].innerHTML = files[0].name;
            document.getElementsByClassName('upload-file-size')[0].innerHTML = files[0].size/1000+'kb';
        }
    }
</script>
@endsection
