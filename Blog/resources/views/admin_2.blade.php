@extends('layouts.app')

@section('css')
<link href="{{asset('css/admin_users.css')}}" rel="stylesheet">
@endsection

@section('content')

@foreach ($last_billet as $billet )

<div class="container-contact100">

            <div class="wrap-contact100">
                <p> By : {{$billet->user->username}}</p><br>

                <p> Titre : {{$billet->title}}</p>
                <p> Tags : {{$billet->tags}}</p>
                <p> {{$billet->content}}</p>
        
                <form method="POST" action="{{route ('admin_delete_billet')}}">
                    @csrf

                    <input type="hidden" name="Id" value="{{$billet->id}}"><br>

                    <button class="contact100-form-btn">Supprimer</button>

                </form>
            </div>
        
        <div id="dropDownSelect1"></div>
    </div>
@endforeach
{{ $last_billet->links() }}

@endsection