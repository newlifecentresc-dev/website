<!-- Navigation Start -->
<header class="header-section bg-white">
    <div class="container">
        <!-- logo -->
        <a href="/" class="site-logo">
            <img src="{{ $settings->site_logo }}" alt="{{ $settings->site_title }}">
        </a>
        <!-- <a href="" class="site-btn hidden-xs">send donation</a> -->
        <!-- nav menu -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        @include('main.components.custom.navigation', ['data' => $data])
    </div>
</header>
<!-- Navigation End -->
