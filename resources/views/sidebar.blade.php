<div style="height: 960px; width: 250px;" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark"
    style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Tourist Group</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin" class="nav-link text-white" aria-current="page">

                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.create') }}" class="nav-link text-white">

                Add Admins
            </a>
        </li>
        <li>
            <a href="{{ route('group.create') }}" class="nav-link text-white">

                Add Group
            </a>
        </li>
        <li>
            <a href="{{ route('register.index') }}" class="nav-link text-white">

                Peoples
            </a>
        </li>
        <li>
            <a href="{{ route('history.index') }}" class="nav-link text-white">

                History
            </a>
        </li>
        <li>
            <a href="{{ route('contact.index') }}" class="nav-link text-white">

                Contact
            </a>
        </li>
        <li>
            <a href="{{ route('admin.show', 1) }}" class="nav-link text-white">

                Logout
            </a>
        </li>
    </ul>
    <hr>

</div>
