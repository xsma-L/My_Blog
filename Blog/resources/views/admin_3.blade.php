@extends('layouts.app')

@section('css')
<link href="{{asset('css/admin_users.css')}}" rel="stylesheet">
@endsection

@section('content')

@foreach ($last_comments as $comment )

<div class="container-contact100">

            <div class="wrap-contact100">
                <p> By : {{$comment->user->username}}</p><br>

                <p> {{$comment->comment_content}}</p>
        
                <form method="POST" action="{{route ('admin_delete_comment')}}">
                    @csrf

                    <input type="hidden" name="Id" value="{{$comment->id}}"><br>

                    <button class="contact100-form-btn">Supprimer</button>

                </form>
            </div>
        
        <div id="dropDownSelect1"></div>
    </div>
@endforeach
{{ $last_comments->links() }}

@endsection