<nav class="col-md-2 flex-column flex-sm-row bg-dark sidebar">
    @if (Auth::check())
    <div class="sidebar-sticky">
        <ul class="nav flex-column nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    Peliculas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Actores
                </a>
            </li>
        </ul>
    </div>
    @endif
</nav>