<!DOCTYPE HTML>
<html lang="en">
@include('partials.head')

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="page-content pb-0">

        <div data-card-height="cover" class="card">
            <div class="card-center">
                <div class="ps-5 pe-5">
                    <h1 class="color-white text-center font-40 font-800 mb-2">Forgot</h1>
                    <p class="color-white text-center font-12 font-300 mb-1">{{ __('Forgot your password? No problem, claim a new one.') }}</p>

                    <div class="color-green-dark text-center font-15 font-500 mb-1">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <p class="color-highlight text-center font-12">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </p>
                        <div class="input-style input-transparent no-borders has-icon validate-field">
                            <i class="fa fa-at"></i>
                            <input type="email" class="form-control validate-text" id="email" name="email" placeholder="Email" required autofocus>
                            <label for="form2a" class="color-highlight">Email</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <div class="d-flex mt-4 mb-2">
                            <div class="w-50 font-11 pb-2 color-white opacity-60 text-start"><a href="{{route('login')}}" class="color-white">Login Account</a></div>
                        </div>


                        <button type="submit" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-900 bg-highlight">Reset Password</button>
                    </form>
                </div>
            </div>
            <div class="card-overlay bg-black opacity-85"></div>
            <div class="card-overlay-infinite preload-img" data-src="{{asset('assets/images/pictures/_bg-infinite.jpg')}}"></div>
        </div>

    </div>

</div>

@include('partials.scripts')
</body>
