<nav class="navbar navbar-expand-lg" style="background: var(--background)">
    <img src="/img/pod.svg" style="height: 60px; width: auto" />
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
            @else
                <li class="nav-item my-auto">
                    <a class="nav-link mx-5" href="/">Home</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link mx-5" href="/about">About</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link mx-5" href="/">Team</a>
                </li>
                <div class="my-auto" align="right">
                    <a href="/login" class="btn-primary mx-2">Login</a>
                    <a href="/register" class="btn-secondary mx-2">Register</a>
                </div>
            @endif
        </ul>
    </div>
</nav>
