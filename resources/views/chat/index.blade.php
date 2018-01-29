@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <div class="list-group">
                    <chat-log :messages="messages"></chat-log>
                </div>
                <chat-composer v-on:sent="addMessage"></chat-composer>
            </div>
        </div>

    </div>
@endsection

