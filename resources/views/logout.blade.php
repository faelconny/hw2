@extends('layouts.guest')

@section('title', 'Logout')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/logout.css') }}">
@endsection

@section('content')
    <nav>
        <div id="logo">Blog del Cinema</div>
        <div id="links">
            <a href="{{ route('login') }}">Accedi</a>
        </div>
    </nav>
    <main>
        <h1>La disconnessione è stata effettuata con successo</h1>
        <a href="{{ route('login') }}">Torna al login</a>
    </main>
@endsection