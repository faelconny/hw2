@extends('layouts.user')

@section('title', 'Profilo')

@section('style')
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/profile.css">
@endsection

@section('script')
    <script src="scripts/profile.js" defer></script>
@endsection

@section('sidebar-content')
    <div class="link">
        <a href="{{ route('home') }}">Home</a>
    </div>
    <div class="link">
        <a href="{{ route('favourites') }}">Film preferiti</a>
    </div>
    <div class="link">
        <a href="{{ route('logout') }}">Esci</a>
    </div>
@endsection

@section('links')
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('favourites') }}">Film preferiti</a>
    <a href="{{ route('logout') }}">Esci</a>
@endsection

@section('profile')
@endsection

@section('article')
    <main>
        <div id="info">
            <img id="photo" src="{{ $user['picture'] }}">
            <table>
                <tr><td><strong>Nome:</strong></td><td>{{ $user['name'] }}</td></tr>
                <tr><td><strong>Cognome:</strong></td><td>{{ $user['surname'] }}</td></tr>
                <tr><td><strong>Username:</strong></td><td>{{ $user['username'] }}</td></tr>
                <tr><td><strong>Email:</strong></td><td>{{ $user['email'] }}</td></tr>
            </table>
        </div>
        <h1>Modifica password</h1>
        @if (isset($error) && $error == true)
            <p>Password attuale errata!</p>
        @elseif (isset($error) && $error == false)
            <p>Password modificata con successo!</p>
        @endif
        <p class="hidden" id="password-error">La password non rispetta i requisiti di sicurezza!</p>
        <p class="hidden" id="confirm-password-error">Le password non coincidono!</p>
        <p class="hidden" id="empty-error">Compilare tutti i campi!</p>
        <div class="form-box">
            <form name="change-password" method="post" action="{{ route('profile-post') }}">
            @csrf
                <label id="old-pssw">Password attuale <input type="password" name="old-password"></label>
                <label>Nuova password <input type="password" name="new-password" id="new-password"></label>
                <label>Conferma password <input type="password" name="confirm-password" id="confirm-password"></label>
                <label>&nbsp;<input type='submit' value='Modifica'>&nbsp;</label>
            </form>   
        </div> 
    </main>
@endsection