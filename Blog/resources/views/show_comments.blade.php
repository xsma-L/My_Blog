@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-contact100">
        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>


        <div class="wrap-contact100">
            <div class='post'>
                By {{$post->user->username}}
                <div class="titre">
                    {{$post->title}}
                    <br>    
                </div>
                <div class="tags">
                    {{$post->tags}}
                </div>
                
                <div class="content">
                    {{$post->content}}
                </div>
            </div>
            <br>
            
            <p>Commentaires :</p>
            
                @foreach ($comments as $data)
                    <div class="comment">
                        <div>
                            By {{$data->user->username}}
                        </div>
                        {{$data->comment_content}}
                    </div>
                @endforeach
                <br>
            <form class="contact100-form validate-form" method="POST" action="{{ route('comment_done') }}">
            @csrf

            <span class="contact100-form-title">
                    Commenter :
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
                    <textarea class="input100" name="commentaire" placeholder="Votre commentaire"></textarea>
                    <span class="focus-input100"></span>

                <input type="hidden" name="Id" value="{{$post->id}}">
                </div>

                <div class="container-contact100-form-btn">
                    <button
                        class="contact100-form-btn">
                        Commenter
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection