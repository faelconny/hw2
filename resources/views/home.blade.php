@extends('layouts.user')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
@endsection

@section('script')
    <script src="{{ asset('scripts/home.js') }}" defer></script>
@endsection

@section('sidebar-content')
    <div class="link">
        <a href="{{ route('favourites') }}">Film preferiti</a>
    </div>
    <div class="link">
        <a href="{{ route('profile') }}">Profilo</a>
    </div>
    <div class="link">
        <a href="{{ route('logout') }}">Esci</a>
    </div>
@endsection

@section('links')
    <a href="{{ route('favourites') }}">Film preferiti</a>
    <a href="{{ route('profile') }}">Profilo</a>
    <a href="{{ route('logout') }}">Esci</a>
@endsection

@section('profile')
    @parent
@endsection

@section('article')
    <div class="form-box">
        <h1>Nuovo post</h1>
        <form name="post-form" method="post" enctype="multipart/form-data" action="{{ route('signup') }}">
        @csrf
            <label><textarea name="text" cols="30" rows="10" placeholder="Inserisci la descrizione..."></textarea></label>
            <label for="file-upload" class="custom-file-upload">Carica un'immagine</label>
            <label><input type="file" name="picture" accept="image/*" id="file-upload"></label>
            <label><input type="submit" name="submit" value="Pubblica" disabled></label>
        </form>
    </div>
    <div id="feed"></div>
    <template>
        <section class="post">
            <div class="header">
                <div class="user">
                    <img src="">
                    <div>
                        <span><strong class="name"></strong></span><br>
                        <span><em class="username"></em></span>
                    </div>
                </div>
                <div class="date">
                    <span></span>
                </div>
            </div>
            <div class="content">
                <p></p>
                <img src="" class="hidden">
            </div>
            <div class="bottom">
                <div class="like">
                    <img src="{{ asset('img/like.png') }}">
                    <span></span>
                </div>
            </div>
            <div class=""></div>
        </section>
    </template>
@endsection