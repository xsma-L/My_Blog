@extends('layouts.app')

@section('css')
<link href="{{asset('css/admin_users.css')}}" rel="stylesheet">
@endsection

@section('content')

@foreach ($last_user as $user )

<div class="container-contact100">

            <div class="wrap-contact100">
                <p>Prénom : {{$user->name}}</p>
                <p>Nom : {{$user->lastname}}</p>
                <p>Email : {{$user->email}}</p>

            @if($user->blocked == 0)
                <p>Bloqué : NON</p>
            @else
                <p>Bloqué : OUI</p>
            @endif        
            
        @if($user->blocked == 0)    
            <form method="POST" action="{{route ('block')}}">
                @csrf

                <input type="hidden" name="Id" value="{{$user->id}}"><br>

                <button class="contact100-form-btn">Bloquer</button>
            </form>
        @else
        
        <form method="POST" action="{{route ('unlock')}}">
                @csrf

                <input type="hidden" name="Id" value="{{$user->id}}"><br>

                <button class="contact100-form-btn">Débloquer</button>

            </form>
        @endif
            </div>
        
        <div id="dropDownSelect1"></div>
    </div>
@endforeach
{{ $last_user->links() }}

@endsection