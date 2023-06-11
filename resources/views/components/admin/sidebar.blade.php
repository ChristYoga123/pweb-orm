<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/assets/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Stay<span class="font-medium">Cation</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route("admin.dashboard.index") }}" class="side-menu {{ Route::is("admin.dashboard.index") ? "side-menu--active" : "" }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route("admin.venue.index") }}" class="side-menu {{ Route::is("admin.venue.*") ? "side-menu--active" : "" }}">
                <div class="side-menu__icon"> <i data-feather="map"></i> </div>
                <div class="side-menu__title"> Data Venue </div>
            </a>
        </li>
        <li>
            <a href="{{ route("admin.transaction.index") }}" class="side-menu {{ Route::is("admin.transaction.*") ? "side-menu--active" : "" }}">
                <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                <div class="side-menu__title"> Data Transaksi </div>
            </a>
        </li>
    </ul>
</nav>