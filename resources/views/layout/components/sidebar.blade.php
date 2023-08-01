<aside id="sidebar" class="sidebar p-0 pt-3">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <span>Home</span>
            </a>
        </li>
        <li class="nav-heading">PUBLIC</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('questions') }}">
                <i class="bi bi-globe"></i>
                <span>Questions</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('tags') }}">
                <i class="bi bi-tags"></i>
                <span>Tags</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users') }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-heading">User</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>

</aside>
