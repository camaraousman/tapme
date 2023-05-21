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
                    <h1 class="color-white text-center font-800 font-40 mb-4">Sign In</h1>
                    @if ($errors->get('email'))
                        @foreach ((array) $errors->get('email') as $message)
                            <p class="color-highlight text-center font-12">{{ $message }}</p>
                        @endforeach
                    @endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="input-style input-transparent no-borders has-icon validate-field mt-2">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control validate-name" id="email" name="email" placeholder="Email">
                        <label for="form1aa" class="color-blue-dark font-10 mt-1">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mt-2">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-text" id="form3a" name="password" placeholder="Password">
                        <label for="form3a" class="color-blue-dark font-10 mt-1">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>

                    <button class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-900 bg-highlight">Login</button>
                </form>

                    <div class="text-center mb-5 mt-5">
                        @if (Route::has('password.request'))
                            <a href="{{route('password.request')}}" class="color-white font-12 opacity-60">Forgot Password?</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-overlay-infinite preload-img" data-src="{{asset('assets/images/pictures/_bg-infinite.jpg')}}"></div>
            <div class="card-overlay bg-black opacity-80"></div>
        </div>
    </div>

</div>

@include('partials.scripts')
</body>
