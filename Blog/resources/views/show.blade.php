@extends('layouts.app');

@section('css')
<link href="{{ asset('css/show_billets.css')}}" rel="stylesheet">
@endsection

@section('content')
    @foreach ($users as $post)

    <div class="container-contact100">

      <div class="wrap-contact100">
        <a href="{{ URL::route('update_billets', $post->id)}}"><button class="modifier">modifier</button></a><br>

        <a href="{{ URL::route('delete_billets', [$post->id, $post->user_id])}}"><button class="supprimer">supprimer</button></a><br>

        <p>By {{$post->user->username}}</p>

        <p>Titre : {{$post->title}}</p>
  
        <p>{{$post->content}}</p>
        
        <p>{{$post->tags}}</p>

          @php
          $nb = count($post->comments);
          @endphp

        <p>Nombre de commentaires : {{$nb}}</p>
        <a href="{{URL::route('comment_billets', $post->id)}}"><button class="contact100-form-btn">Commnenter</button></a>  
      </div>
    </div>          

    @endforeach
    {{ $users->links() }}

    @endsection