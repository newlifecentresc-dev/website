<nav class="main-menu">
    <ul>
        {{-- <li class=""><a class="text-danger" href="">Home</a></li> --}}
        @forelse ($menus as $nav)
            <li class="{{ $nav->slug }}">
                <a href="{{ $nav->slug }}">{{ $nav->title }}</a>
            </li>
        @empty  
            <div class="alert alert-warning">
                <strong>Warning!</strong> No Menu
            </div>
        @endforelse
    </ul>
</nav>
