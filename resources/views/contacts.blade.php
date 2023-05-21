@extends('layouts.contacts')

@section('extra_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/styles/contacts.css')}}">
@endsection
@section('content')
    <!-- Begin Page Content-->
        <div class="contact-container">
            <!--  SEARCH FORM -->
            <header class="contact-header">
                <form class="search-bar">
                    <input type="search-name" class="contact-search" name="search-area" placeholder="{{__('Search')}}">
                </form>
            </header>

            <!--  CONTACT LIST -->
            <section class="contacts-library">
                <ul class="contacts-list">
                    @foreach($contacts as $contact)
                        <a data-menu="instant-3" onclick="get_contact({{$contact->id}})" class="ling-tag" href="#">
                            <div class="contact-section">
                                <li class="list__item">
                                    <p class="contact-name font-18">{{$contact->name}}</p>
                                </li>

                                <li class="list__item">
                                    <i class="fa fa-info-circle float-end font-16 pt-1 color-blue-dark"></i>
                                </li>
                            </div>
                        </a>
                        <hr>
                    @endforeach
                </ul>
                <div class="mb-4 d-flex align-items-center justify-content-center">
                    {{ $contacts->withQueryString()->links() }}
                </div>
            </section>
        </div>

    <div id="instant-3"
         class="menu menu-box-top"
         data-menu-width="cover"
         data-menu-height="cover"
         data-menu-effect="menu-over">

        <div class="profile-container">
            <header class="hero">
                <div class="hero-info">
                    <h1 class="name" id="name"></h1>
                    <p  class="position color-white font-17" id="position_header"></p>
                </div>
            </header>

            <section class="contact-info">
                <div class="info-line">
                    <i class="fas fa-phone icon-gradient"></i>
                    <p class="phone-number color-white font-14" id="phone_number"></p>
                </div>

                <div class="info-line">
                    <i class="fas fa-briefcase icon-gradient"></i>
                    <p class="sms color-white font-14" id="position"></p>
                </div>

                <div class="info-line">
                    <i class="fas fa-envelope icon-gradient"></i>
                    <p class="email color-white font-14" id="email"></p>
                </div>

                <div class="info-line">
                    <i id="location" class="fas fa-building icon-gradient"></i>
                    <p class="address color-white font-14" id="company"></p>
                </div>
            </section>
        </div>

        <a href="#" class="text-center close-menu notch-clear close-button btn-full btn-m rounded-s text-uppercase font-900 me-3 ms-3 mt-2 mb-3">{{__('Close')}}</a>
    </div>
@endsection

@section('extra_script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        function get_contact(id){
            $.ajax({
                type: "post",
                url: "{{route('get_contact')}}",
                data: {
                    id: id
                },
                success: function (data) {
                    console.log(data.name)
                    $('#name').text(data.name)
                    $('#phone_number').text(data.phone)
                    $('#email').text(data.email)
                    $('#position').text(data.position)
                    $('#position_header').text(data.position)
                    $('#company').text(data.company)
                },
                error: function () {

                }
            });
        }
    </script>
@endsection

