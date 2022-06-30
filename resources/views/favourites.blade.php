@extends('layouts.user')

@section('title', 'Preferiti')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/favourites.css') }}">
@endsection

@section('script')
    <script src="{{ asset('scripts/favourites.js') }}" defer></script>
@endsection

@section('sidebar-content')
    <div class="link">
    <a href="{{ route('home') }}">Home</a>
    </div>
    <div class="link">
        <a href="{{ route('profile') }}">Profilo</a>
    </div>
    <div class="link">
        <a href="{{ route('logout') }}">Esci</a>
    </div>
@endsection

@section('links')
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('profile') }}">Profilo</a>
    <a href="{{ route('logout') }}">Esci</a>
@endsection

@section('profile')
    @parent
@endsection

@section('article')
    <main>
        <div class="form-box">
            <h1>Ricerca un film e aggiungilo ai preferiti!</h1>
            <form name="movie-form">
                <label>&nbsp;<input type="text" name="movie" placeholder="Nome del film...">&nbsp;</label>
                <label>&nbsp;<input type="submit" value="Cerca" name="submit" disabled>&nbsp;</label>
            </form>
        </div>
    <main>
    <div id="loading" class="hidden">
        <img src="{{ asset('img/loading.svg') }}">
    </div>
    <div id="section" class="hidden">
        <div class="movie"></div>
        <div id="star">
            <img src="{{ asset('img/star.png') }}">
            <div>Aggiungi ai preferiti</div>
        </div>
        <div id="counter">
            <em>&#200; tra i preferiti di <span id="num-favourites"></span> utenti</em>
        </div>
    </div>
    <section class="hidden"></section>
@endsection