<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-settings d-none d-lg-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link text-body font-weight-bold px-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="ti-power-off text-primary"></i>
                        <span class="d-sm-inline d-none">log out</span>
                        {{-- <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>{{ __('Log Out') }}</span>
    </div>--}}
                    </a>
                </form>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
