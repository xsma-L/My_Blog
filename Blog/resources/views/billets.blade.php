@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/billets.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-contact100">
        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="{{ route('publication') }}">
            @csrf

                <span class="contact100-form-title">
                    Nouveau Post
                </span>

                <div class="wrap-input100 validate-input" data-validate="Please entrer votre titre">
                    <input class="input100" type="text" name="titre" placeholder="Votre titre">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="tags" placeholder="Vos tags">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                    <textarea class="input100" name="contenu" placeholder="Votre post"></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Publier
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection