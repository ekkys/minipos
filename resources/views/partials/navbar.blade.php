<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-cash-register"></i>Mini POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
         aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link  {{ ( $active === "home" ? 'active' : '') }}" aria-current="{{ route('home.index') }}" href="">Home</a> 
            </li>
            <li class="nav-item">
            <a class="nav-link " href="">Products</a>
            {{-- {{ ( $active === "about" ? 'active' : '') }} --}}
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ( $active === "category" ? 'active' : '') }}" href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ( $active === "customer" ? 'active' : '') }}" href="{{ route('customers.index') }}">Customers</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ ( $active === "suppliers" ? 'active' : '') }}" href="{{ route('suppliers.index') }}">Suppliers</a>
            
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
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                        </form>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                <a class="nav-link " href="{{ route('login') }}"> <i class="bi bi-box-arrow-in-right"></i>   Login </a>
                </li>
            @endauth
        </ul>
        {{-- {{ ( $active === "login" ? 'active' : '') }} --}}
        </div>
    </div>
</nav>

