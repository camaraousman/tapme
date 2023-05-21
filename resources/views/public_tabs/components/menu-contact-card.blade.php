<div id="menu-contact-card" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="400">
    <div data-card-height="400" class="card mb-3 preload-img" data-src="{{asset('assets/images/pictures/14w.jpg')}}">
        <div class="card-center text-center">
            <h1 class="fa-4x color-white pt-3">{{config('app.name')}}</h1>
            <p class="color-highlight mb-3 mt-2">{{__('Download my contact details in one click')}}</p>
            <h1 class="color-white text-center scale-icon font-14 pb-3"><i class="fa fa-arrow-down color-white"></i></h1>
            <a href="{{url('/'.$user['username'].'_export')}}"  class="default-link mb-5 btn btn-m rounded-s btn-center-xl bg-red-dark font-900 text-uppercase">{{__('DOWNLOAD V-CARD')}}</a>
        </div>
        <div class="card-overlay bg-black opacity-85"></div>
    </div>
</div>
