@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @if(count($users) > 0)
                    <p>Login or select any user below:</p>
                    <ul>
                        @foreach($users as $user)
                        <li><a href="/login/{{$user->id}}">{{$user->email}}</a></li>
                        @endforeach
                    </ul>
                    @else
                    <p>Please register a new user.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
