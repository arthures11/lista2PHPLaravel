<nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>ArturLearning</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                @auth
                @if($user->hasRole('nauczyciel'))
                <li class="nav-item"><a class="nav-link" href="/uczniowie">Uczniowie</a></li>
                <li class="nav-item"><a class="nav-link" href="/pytania">Baza pytań</a></li>
                <li class="nav-item"><a class="nav-link" href="/addtest">Testy</a></li>
                @else
                @endif
                @endauth
                @auth
                @if($user->hasRole('student'))
                <li class="nav-item"><a class="nav-link" href="/testy">Testy</a></li>
                @else
                @endif
                @endauth
            </ul>
            @guest
            <div class="text-end">
                <a class="btn btn-primary shadow" role="button" href="{{ route('login.perform') }}">LOGIN</a>
                <a class="btn btn-primary shadow" role="button" href="{{ route('register.perform') }}">REJESTRUJ</a>
            </div>
            @endguest
            @auth
            <a class="btn btn-primary shadow" role="button" href="{{ route('logout.perform') }}">WYLOGUJ</a>
            @endauth
        </div>
    </div>
</nav>
