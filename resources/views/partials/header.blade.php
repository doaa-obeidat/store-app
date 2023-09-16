<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">Store App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a>
                </li>
{{--                @auth--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-danger fw-bold">Logout</a>--}}
{{--                    </li>--}}
{{--                @endauth--}}

{{--                @guest--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-danger fw-bold">Not Logged in</a>--}}
{{--                    </li>--}}
{{--                @endguest--}}
            </ul>
        </div>
    </div>
</nav>
