@extends('layouts.app')

@section('content')
    <div id="app">
        <div class="container">
            <div class="col-md-offset-2 col-md-3">
                <div class="list-group">
                    <div class="list-group-item active">Conversations</div>
                    <conversation-log :conversations="conversations"></conversation-log>
                </div>
            </div>
            <div class="col-md-5">
                <div class="list-group">
                    <div class="list-group-item active">Messages</div>
                    <chat-log :conversations="conversations"></chat-log>
                </div>
                <chat-composer user-name="{{ Auth::user()->name }}" v-on:sent="addMessage"></chat-composer>
            </div>
        </div>
    </div>
@endsection

