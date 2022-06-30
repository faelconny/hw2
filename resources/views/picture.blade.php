@extends('layouts.user')

@section('title', 'Immagine del profilo')

@section('style')
<link rel="stylesheet" href="{{ asset('styles/profile_picture.css') }}">
@endsection

@section('script')
<script src="{{ asset('scripts/profile_picture.js') }}" defer></script>
@endsection

@section('sidebar')
@endsection

@section('header')
@endsection

@section('profile')
@endsection

@section('links')
<a href="{{ route('logout') }}">Esci</a>
@endsection

@section('article')
<main id="profile-picture-main">
    <section id="profile-picture-box" class="box">
    <h1>{{ $user['name'] }}, scegli un'immagine del profilo</h1>
        <img src="" data-id="one">
        <img src="" data-id="two">
        <img src="" data-id="three">
        <img src="" data-id="four">
        <img src="" data-id="five">
        <img src="" data-id="six">
        <img src="" data-id="seven">
        <img src="" data-id="eight">
        <img src="" data-id="nine">
        <button>Invia</button>
    </section>
</main>
@endsection

@section('footer')
@endsection