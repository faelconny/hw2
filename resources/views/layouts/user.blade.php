@extends('layouts.app')

@section('body')
    <body>
        @section('sidebar')
        <div class="sidebar">
            <img src="img/close_white.png">
            <div>
                @yield('sidebar-content')
            </div>
        </div>
        <div class="hidden close-sidebar"></div>
        @show
        <div class="page">
            <nav>
                <div id="logo">Blog del Cinema</div>
                <div id="links">
                    @yield('links')
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
            @section('header')
                <header>
                    <div class="overlay"></div>
                </header>
            @show
            @section('profile')
                <div id="profile">
                    <img id="photo" src="{{ $user['picture'] }}">
                    <div id="name">
                        <strong>{{ $user['name']." ".$user['surname'] }}</strong><br>
                        <em>{{ "@".$user['username'] }}</em>
                    </div>
                </div>
            @show
            <article>
                @yield('article')
            </article>
            @section('footer')
                <footer>
                    <div>
                        Università degli Studi di Catania<br>
                        Dipartimento di Ingegneria Elettrica Elettronica e Informatica<br>
                        <a href="https://www.dieei.unict.it/corsi/l-8-inf">Corso di Laurea in Ingegneria Informatica</a>
                    </div>
                    <div>
                        Felice Simone Coniglio<br>
                        n. matricola: 1000001151<br>
                        e-mail: <a href="mailto:felice.coniglio@studium.unict.it">felice.coniglio@studium.unict.it</a>
                    </div>
                </footer>
            @show
        </div>
    </body>
@endsection