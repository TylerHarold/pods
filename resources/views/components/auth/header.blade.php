<nav class="navbar navbar-expand-lg w-100" style="background: var(--stroke); height: 5%">
    <h3>{{ $pageTitle }}</h3>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link mx-3" href="/" style="font-size: 28px;"><i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="/search" style="font-size: 28px;"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-3" href="/u" style="font-size: 28px;"><img src="{{ Auth::user()->avatar }}" width="36" height="36"></a>
                </li>
            @endif
        </ul>
    </div>
</nav>
