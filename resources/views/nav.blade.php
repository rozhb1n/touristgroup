<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top py-3 " id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-white" href="/">MZURI Tourist Group</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 ">
                <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('group.index') }}">Groups</a>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('contact.create') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>