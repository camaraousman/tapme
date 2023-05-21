<!DOCTYPE HTML>
<html lang="en">
@include('partials.head')

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    <div class="page-content pb-0">
        <div class="card bg-14" data-card-height="cover">
            <div class="card-center">
                <p class="color-white text-center font-13 mt-n2 mb-4 font-400">Let's verify your account before we proceed.</p>

                @if (session('status') == 'verification-link-sent')
                    <p class="color-green-dark text-center font-15 mt-n2 mb-4 font-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" data-menu="menu-verified" class='btn btn-highlight rounded-sm btn-m bg-green-dark text-uppercase font-700 mt-4 btn-center-xl'>
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <p class="pt-2 font-11 text-center mb-0"><button type="submit">Logout</button>
                </form>

            </div>
            <div class="card-overlay bg-black opacity-80"></div>
            <div class="card-overlay-infinite preload-img" data-src="{{asset('assets/images/pictures/_bg-infinite.jpg')}}"></div>
        </div>
    </div>

</div>

@include('partials.scripts')
</body>
