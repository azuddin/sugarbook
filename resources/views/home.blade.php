@extends('layouts.app')

@section('content')
<div class="container" id="vue-app">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <todo-add-form></todo-add-form>
            </div>
        </div>
    </div>
</div>
@endsection
