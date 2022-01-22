<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/">Mini POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="">Home</a> 
            {{-- {{ ( $active === "home" ? 'active' : '') }} --}}
            </li>
            <li class="nav-item">
            <a class="nav-link " href="">Products</a>
            {{-- {{ ( $active === "about" ? 'active' : '') }} --}}
            </li>
            <li class="nav-item">
            <a class="nav-link " href="">Suppliers</a>
            {{-- {{ ( $active === "posts" ? 'active' : '') }} --}}
            </li>
            <li class="nav-item">
            <a class="nav-link " href="">Purchases</a>
            {{-- {{ ( $active === "categories" ? 'active' : '') }} --}}
            </li>
            <li class="nav-item">
            <a class="nav-link " href="">Sales</a>
            {{-- {{ ( $active === "categories" ? 'active' : '') }} --}}
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-window-sidebar"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                        </form>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                <a class="nav-link " href="/login"> <i class="bi bi-box-arrow-in-right"></i>   Login </a>
                </li>
            @endauth
        </ul>
        {{-- {{ ( $active === "login" ? 'active' : '') }} --}}
        </div>
    </div>
</nav>
