@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/billets.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- @foreach ($post as $data) --}}
    
    @if($post->user_id == $id_user)
        
        <div class="container-contact100">
            <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>
            
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" method="POST" action="{{route('update_done')}}">
                @csrf
                
                    <span class="contact100-form-title">
                        Modification de Post
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate="Please entrer votre titre">
                        <input class="input100" type="text" name="titre" placeholder="{{$post->title}}">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="tags" placeholder="{{$post->tags}}">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                        <textarea class="input100" name="contenu" placeholder="{{$post->content}}"></textarea>
                        <span class="focus-input100"></span>
                    </div>

                <input type="hidden" id="Id" name="Id" value="{{$post->id}}">

                    
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
                            Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        
        
        <div id="dropDownSelect1"></div>
    @else
        <p>vous ne pouvez pas accéder à cette page</p>
    @endif
{{-- @endforeach --}}
    @endsection